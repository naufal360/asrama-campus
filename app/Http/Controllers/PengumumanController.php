<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\Pengumumans;
use App\Models\Surat;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengumumanController extends Controller
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
            return view('dashboard.pengumuman.index', [
                'title' => 'Pengumuman',
                'navbar_params' => 'pengumuman',
                'pengumumans' => Pengumumans::orderBy('created_at', 'desc')->get(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.pengumuman.index', [
            'title' => 'Pengumuman',
            'navbar_params' => 'pengumuman',
            'pengumumans' => Pengumumans::orderBy('created_at', 'desc')->get(),
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
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // membuat pengumuman data
        Pengumumans::create($validateData);
        return redirect('/dashboard/pengumuman')->with('success', 'Berhasil membuat pengumuman baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function show(Pengumumans $pengumuman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengumumans  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumumans $pengumuman)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengumumans  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumumans $pengumuman)
    {
        // validasi data
        $validateData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // membuat pengumuman data
        Pengumumans::where('id', $pengumuman->id)->update($validateData);
        return redirect('/dashboard/pengumuman')->with('success', 'Berhasil update pengumuman!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengumumans  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumumans $pengumuman)
    {
        //
        $pengumuman->destroy($pengumuman->id);

        return redirect('/dashboard/pengumuman')->with('success', 'Berhasil delete pengumuman!');
    }
}