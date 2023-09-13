<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Asrama;
use App\Models\Surat;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // jika bukan admin
        if (!auth()->user()->is_admin) {
            return view('dashboard.dokumentasi.index', [
                'title' => 'Dokumentasi',
                'navbar_params' => 'dokumentasi',
                'dokumentasis' => Dokumentasi::orderBy('created_at', 'desc')->get(),
                'asramas' => Asrama::all(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.dokumentasi.index', [
            'title' => 'Dokumentasi',
            'navbar_params' => 'dokumentasi',
            'dokumentasis' => Dokumentasi::orderBy('created_at', 'desc')->get(),
            'asramas' => Asrama::all(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
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
        // validasi data
        $validateData = $request->validate([
            'asrama_id' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:10280|required',
        ]);

        // menyimpan nama asrama
        $asrama = Asrama::where('id', $validateData['asrama_id'])->first();
        $validateData['nama_asrama'] = "Asrama " . $asrama->nama;

        // menyimpan gambar pada folder storage
        $validateData['foto'] = $request->file('foto')->store('dokumentasi_foto');

        // membuat pengumuman data
        Dokumentasi::create($validateData);
        return redirect('/dashboard/dokumentasi')->with('success', 'Berhasil membuat dokumentasi baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumentasi $dokumentasi)
    {
        // jika bukan admin
        if (!auth()->user()->is_admin) {
            return view('dashboard.dokumentasi.show', [
                'title' => 'Dokumentasi',
                'navbar_params' => 'dokumentasi',
                'dokumentasi_content' => $dokumentasi->where('id', $dokumentasi->id)->first(),
                'dokumentasis' => $dokumentasi->whereNotIn('id', [$dokumentasi->id])->limit(6)->orderBy('created_at', 'desc')->get(),
                'asramas' => Asrama::all(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.dokumentasi.show', [
            'title' => 'Dokumentasi',
            'navbar_params' => 'dokumentasi',
            'dokumentasi_content' => $dokumentasi->where('id', $dokumentasi->id)->first(),
            'dokumentasis' => $dokumentasi->whereNotIn('id', [$dokumentasi->id])->limit(6)->orderBy('created_at', 'desc')->get(),
            'asramas' => Asrama::all(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumentasi $dokumentasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumentasi $dokumentasi)
    {
        // validasi data
        $validateData = $request->validate([
            'asrama_id' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:10280|nullable',
        ]);

        if ($request->file('foto')) {
			if ($dokumentasi->foto) {
				Storage::delete($dokumentasi->foto);
			}
			$validateData['foto'] = $request->file('foto')->store('dokumentasi_foto');
		}

        // menyimpan nama asrama
        $asrama = Asrama::where('id', $validateData['asrama_id'])->first();
        $validateData['nama_asrama'] = "Asrama " . $asrama->nama;

        Dokumentasi::where('id', $dokumentasi->id)->update($validateData);

        return redirect('/dashboard/dokumentasi/' . $dokumentasi->id)->with('success', 'Berhasil update dokumentasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumentasi  $dokumentasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumentasi $dokumentasi)
    {
        // hapus foto
        if ($dokumentasi->foto) {
            Storage::delete($dokumentasi->foto);
        }

        // hapus data pada table dokumentasi
        Dokumentasi::destroy($dokumentasi->id);

        return redirect('/dashboard/dokumentasi')->with('success', 'Berhasil delete dokumentasi!');
    }
}