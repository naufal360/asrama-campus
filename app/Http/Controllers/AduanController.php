<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Aduan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // default query
        $filter_name = 'Semua';
        $all_aduans;

        // jika bukan admin
        if (!auth()->user()->is_admin) {
            // filter query
            if ($request->input('filter') == 'menunggu') {
                $filter_name = 'Menunggu';
                $all_aduans = Aduan::where('mahasiswa_id', auth()->user()->username)->where('status', 'Belum direspon')
                    ->latest()
                    ->paginate(10);
            } else if ($request->input('filter') == 'selesai') {
                $filter_name = 'Selesai';
                $all_aduans = Aduan::where('mahasiswa_id', auth()->user()->username)->where('status', 'Sudah direspon')
                    ->latest()
                    ->paginate(10);
            } else {
                $all_aduans = Aduan::where('mahasiswa_id', auth()->user()->username)->orderByRaw("FIELD(status, 'Belum direspon', 'Sudah direspon') ASC")->paginate(10);
            }

            return view('dashboard.aduan.index', [
                'title' => 'Aduan',
                'navbar_params' => 'aduan',
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'filter_name' => $filter_name,
                'aduans' => $all_aduans,
            ]);
        }

        // jika admin
        // filter query
        if ($request->input('filter') == 'menunggu') {
            $filter_name = 'Menunggu';
            $all_aduans = Aduan::where('status', 'Belum direspon')
                ->latest()
                ->paginate(10);
        } else if ($request->input('filter') == 'selesai') {
            $filter_name = 'Selesai';
            $all_aduans = Aduan::where('status', 'Sudah direspon')
                ->latest()
                ->paginate(10);
        } else {
            $all_aduans = Aduan::orderByRaw("FIELD(status, 'Belum direspon', 'Sudah direspon') ASC")->paginate(10);
        }

        return view('dashboard.aduan.index', [
            'title' => 'Aduan',
            'navbar_params' => 'aduan',
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'filter_name' => $filter_name,
            'aduans' => $all_aduans,
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
            'subjek' => 'required|min:4',
            'deskripsi' => 'required|min:4',
            'file' => 'image|file|max:10280|required',
        ]);

        // menyimpan gambar pada folder storage
        $validateData['file'] = $request->file('file')->store('aduan');

        $data = [
            'subjek' => $validateData['subjek'],
            'deskripsi' => $validateData['deskripsi'],
            'aduan_foto' => $validateData['file'],
            'mahasiswa_id' => auth()->user()->username,
        ];
        // membuat pengumuman data
        Aduan::create($data);
        return redirect('/dashboard/aduan')->with('success', 'Berhasil membuat aduan baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function show(Aduan $aduan)
    {
        // jika bukan admin
        if (!auth()->user()->is_admin) {
            return view('dashboard.aduan.show', [
                'title' => 'Aduan',
                'navbar_params' => 'aduan',
                'aduan' => $aduan->where('id', $aduan->id)->first(),
                'mahasiswa' => Mahasiswa::where('nim', $aduan->mahasiswa_id)->first(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.aduan.show', [
            'title' => 'Aduan',
            'navbar_params' => 'aduan',
            'aduan' => $aduan->where('id', $aduan->id)->first(),
            'mahasiswa' => Mahasiswa::where('nim', $aduan->mahasiswa_id)->first(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Aduan $aduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aduan $aduan)
    {
        //
        $data['status'] = $request->input('status');
        $data['catatan'] = $request->input('catatan');

        // update data surat
        $aduan->where('id', $aduan->id)->update($data);

        return redirect('/dashboard/aduan')->with('success', 'Berhasil update aduan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aduan  $aduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aduan $aduan)
    {
        //
    }
}