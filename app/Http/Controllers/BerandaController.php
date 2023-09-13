<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Aduan;
use App\Models\Surat;
use App\Models\Jurusan;
use App\Models\Pengumumans;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Jurusan $jurusan)
    {
        // query untuk tabel
        $daftarJurusan = Jurusan::pluck('id')->toArray();
        $daftarNama = Jurusan::all();
        $tableData = Mahasiswa::selectRaw('mahasiswas.tahun, mahasiswas.jurusan_id, COUNT(*) as count')
            ->where('mahasiswas.tahun', '<=', 2023)
            ->whereIn('mahasiswas.jurusan_id', $daftarJurusan)
            ->groupBy('mahasiswas.tahun', 'mahasiswas.jurusan_id')
            ->get();

        // jika bukan admin
        if (!auth()->user()->is_admin){
            return view('dashboard.beranda.index', [
                'title' => 'Beranda',
                'navbar_params' => '',
                'judul_chart' => 'Statistik Mahasiswa Penerima Beasiswa',
                'pengumuman' => Pengumumans::orderBy('created_at', 'desc')->first(),
                'charts' => Mahasiswa::selectRaw('tahun, COUNT(*) as count')->groupBy('tahun')->get(),
                'tables' => $tableData,
                'jurusans' => $daftarNama,
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.beranda.index', [
            'title' => 'Beranda',
            'navbar_params' => '',
            'judul_chart' => 'Statistik Mahasiswa Penerima Beasiswa',
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'charts' => Mahasiswa::selectRaw('tahun, COUNT(*) as count')->groupBy('tahun')->get(),
            'tables' => $tableData,
            'jurusans' => $daftarNama,
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
            'pengumuman' => Pengumumans::orderBy('created_at', 'desc')->first(),
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}