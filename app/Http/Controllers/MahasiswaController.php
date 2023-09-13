<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Asrama;
use App\Models\Biodata;
use App\Models\Aduan;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // jika bukan admin
        if (!auth()->user()->is_admin) {
            $mahasiswa = Mahasiswa::where('nim', auth()->user()->username)->first();

            return view('dashboard.mahasiswa.show', [
                'title' => 'Data Mahasiswa',
                'navbar_params' => 'mahasiswa',
                'mahasiswa' => $mahasiswa,
                'count_aduan' => Aduan::where('mahasiswa_id', $mahasiswa->nim)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', $mahasiswa->nim)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }

        // jika admin
        // default query
        $filter_name = 'Semua';
        $all_mahasiswa;

        // filter query
        if ($request->input('filter') == 'asrama') {
            $filter_name = 'Asrama';
            $all_mahasiswa = Mahasiswa::join('asramas', 'mahasiswas.asrama_id', '=', 'asramas.id')
                ->orderBy('asramas.nama', 'ASC')
                ->select('mahasiswas.*')
                ->paginate(10);
        } else if ($request->input('filter') == 'nama') {
            $filter_name = 'Nama';
            $all_mahasiswa = Mahasiswa::orderBy('nama', 'ASC')
                ->select('mahasiswas.*')
                ->paginate(10);
            // $all_mahasiswa = Mahasiswa::join('biodatas', 'mahasiswas.biodata_id', '=', 'biodatas.id')
            //     ->orderBy('biodatas.nama', 'ASC')
            //     ->select('mahasiswas.*')
            //     ->paginate(10);
        } else {
            $all_mahasiswa = Mahasiswa::latest()->paginate(10);
        }

        return view('dashboard.mahasiswa.index', [
            'title' => 'Data Mahasiswa',
            'navbar_params' => 'mahasiswa',
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
            'filter_name' => $filter_name,
            'mahasiswas' => $all_mahasiswa,
            'jurusans' => Jurusan::all(),
            'asramas' => Asrama::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi dan membuat biodata
        $validateBiodata = $request->validate([
            'nim' => 'required|numeric',
            'nama' => 'required',
            'profil_foto' => 'image|file|max:10280|required',
            'alamat' => 'required',
            'tahun' => 'required',
            'periode_asrama' => 'required',
            'email' => 'required|email',
            'dosen_wali' => 'required',
            'nama_tugas_akhir' => 'required',
        ]);

        $password_default = bcrypt(env('USER_DEFAULT_PASSWORD'));
        $string_nim = strval($validateBiodata['nim']);


        // menyimpan gambar
        $validateBiodata['profil_foto'] = $request->file('profil_foto')->store('profil_foto');
        // membuat data biodata baru
        // $id_biodata = Biodata::create($validateBiodata)->id;


        // membuat user mahasiswa pada table user
        $id_user = User::create([
            'username' => $string_nim,
            'password' => $password_default,
        ])->id;


        // validasi asrama dan jurusan
        $mahasiswa = [
            'jurusan' => 'required|numeric',
            'asrama' => 'required|numeric',
        ];

        $mahasiswaValidate = $request->validate($mahasiswa);
        $validateBiodata['nim'] = $string_nim;
        $validateBiodata['jurusan_id'] = (int)$mahasiswaValidate['jurusan'];
        $validateBiodata['asrama_id'] = (int)$mahasiswaValidate['asrama'];
        $validateBiodata['user_id'] = $id_user;
        // $mahasiswaData['biodata_id'] = $id_biodata;

        // membuat data mahasiswa pada table mahasiswa
        Mahasiswa::create($validateBiodata);

        return redirect('/dashboard/mahasiswa')->with('success', 'Berhasil membuat mahasiswa baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('dashboard.mahasiswa.show', [
            'title' => 'Data Mahasiswa',
            'navbar_params' => 'mahasiswa',
            'mahasiswa' => $mahasiswa->where('nim', $mahasiswa->nim)->first(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
            'jurusans' => Jurusan::all(),
            'asramas' => Asrama::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
        $validateBiodata = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tahun' => 'required',
            'periode_asrama' => 'required',
            'email' => 'required|email',
            'dosen_wali' => 'required',
            'profil_foto' => 'image|file|max:10280|null',
            'nama_tugas_akhir' => 'required',
        ]);


        // mencari profil lama lalu hapus dan tambah foto baru
        if ($request->file('profil_foto')) {
			if ($mahasiswa->profil_foto) {
				Storage::delete($mahasiswa->profil_foto);
			}
			$validateBiodata['profil_foto'] = $request->file('profil_foto')->store('profil_foto');
		}

        // update data biodata baru
        Mahasiswa::where('id', $mahasiswa->nim)->update($validateBiodata);

        // validasi asrama dan jurusan
        $mahasiswaValidate = $request->validate([
            'jurusan' => 'required|numeric',
            'asrama' => 'required|numeric',
        ]);

        return redirect('/dashboard/mahasiswa/' . $mahasiswa->nim)->with('success', 'Berhasil update mahasiswa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        // hapus profil foto
        if ($mahasiswa->profil_foto) {
            Storage::delete($mahasiswa->profil_foto);
        }

        // hapus data pada table user, biodata, mahasiswa
        User::destroy($mahasiswa->user_id);
        // Biodata::destroy($mahasiswa->biodata_id);
        // Mahasiswa::destroy($mahasiswa->nim);

        return redirect('/dashboard/mahasiswa')->with('success', 'Berhasil delete mahasiswa!');
    }
}