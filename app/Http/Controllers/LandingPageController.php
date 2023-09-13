<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        return view('index', [
            'dokumentasis' => Dokumentasi::orderBy('created_at', 'desc')->limit(5)->get(),
            'judul_chart' => 'Presentase Penghuni Asrama',
            'charts' => Mahasiswa::selectRaw('tahun, COUNT(*) as count')->groupBy('tahun')->get(),
        ]);
    }
}
