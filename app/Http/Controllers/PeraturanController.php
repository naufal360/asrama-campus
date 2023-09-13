<?php

namespace App\Http\Controllers;

use App\Models\Peraturan;
use App\Models\Aduan;
use App\Models\Surat;
use Illuminate\Http\Request;

class PeraturanController extends Controller
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
            return view('dashboard.peraturan.index', [
                'title' => 'Peraturan',
                'navbar_params' => 'peraturan',
                'peraturans' => Peraturan::orderBy('created_at', 'desc')->get(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }

        // jika admin
        return view('dashboard.peraturan.index', [
            'title' => 'Peraturan',
            'navbar_params' => 'peraturan',
            'peraturans' => Peraturan::orderBy('created_at', 'desc')->get(),
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

        // membuat peraturan data
        Peraturan::create($validateData);
        return redirect('/dashboard/peraturan')->with('success', 'Berhasil membuat peraturan baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peraturan  $peraturan
     * @return \Illuminate\Http\Response
     */
    public function show(Peraturan $peraturan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peraturan  $peraturan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peraturan $peraturan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peraturan  $peraturan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peraturan $peraturan)
    {
        //
        $validateData = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);

        // membuat peraturan data
        $peraturan->where('id', $peraturan->id)->update($validateData);
        return redirect('/dashboard/peraturan')->with('success', 'Berhasil update peraturan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peraturan  $peraturan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peraturan $peraturan)
    {
        //
        $peraturan->destroy($peraturan->id);

        return redirect('/dashboard/peraturan')->with('success', 'Berhasil delete peraturan!');
    }
}