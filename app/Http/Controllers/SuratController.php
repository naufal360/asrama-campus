<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Mahasiswa;
use App\Models\Jurusan;
use App\Models\Asrama;
use App\Models\Aduan;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PDF;


class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // default variable
        $filter_name = 'Semua';
        // $all_surats;

        // jika bukan admin
        if (!auth()->user()->is_admin) {
            // filter query
            if ($request->input('filter') == 'menunggu') {
                $filter_name = 'Menunggu';
                $all_surats = Surat::where('mahasiswa_id', auth()->user()->username)->where('status', 'Belum direspon')
                    ->latest()
                    ->paginate(10);
            } else if ($request->input('filter') == 'selesai') {
                $filter_name = 'Selesai';
                $all_surats = Surat::where('mahasiswa_id', auth()->user()->username)->where('status', 'Ditolak')->orwhere('status', 'Diterima')
                    ->latest()
                    ->paginate(10);
            } else {
                $all_surats = Surat::where('mahasiswa_id', auth()->user()->username)->orderByRaw("FIELD(status, 'Belum direspon', 'Diterima', 'Ditolak') ASC")->paginate(10);
            }

            return view('dashboard.surat.index', [
                'title' => 'Pengajuan Surat',
                'navbar_params' => 'surat',
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'filter_name' => $filter_name,
                'surats' => $all_surats,
            ]);
        }

        // jika admin
        // filter query
        if ($request->input('filter') == 'menunggu') {
            $filter_name = 'Menunggu';
            $all_surats = Surat::where('status', 'Belum direspon')
                ->latest()
                ->paginate(10);
        } else if ($request->input('filter') == 'selesai') {
            $filter_name = 'Selesai';
            $all_surats = Surat::where('status', 'Ditolak')->orwhere('status', 'Diterima')
                ->latest()
                ->paginate(10);
        } else {
            $all_surats = Surat::orderByRaw("FIELD(status, 'Belum direspon', 'Diterima', 'Ditolak') ASC")->paginate(10);
        }

        return view('dashboard.surat.index', [
            'title' => 'Pengajuan Surat',
            'navbar_params' => 'surat',
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
            'filter_name' => $filter_name,
            'surats' => $all_surats,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user()->id;
        $namaUser = User::find($user)->username;
        $data = Mahasiswa::find($namaUser);
        return view('dashboard.surat.create', [
            'title' => 'Pengajuan Surat',
            'navbar_params' => 'Buat Pengajuan',
            'userData' => $data,
            'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $base64Data = $request->pdf_data_uri;
        $base64Data = preg_replace('#^data:application/pdf;base64,#', '', $base64Data);
        $pdfContent = base64_decode($base64Data);
        // $filename = 'nama_berkas.pdf'; // Ganti dengan nama berkas yang sesuai
        $filename = date('YmdHi');
        $pdfFilePath = 'assets/img/pdf_output/' . $filename . '.pdf';
        file_put_contents(public_path($pdfFilePath), $pdfContent);

        $data = [
            'jenis_dokumen' => $request->surat,
            'nama_file' => $pdfFilePath,
            'mahasiswa_id' => auth()->user()->username,
        ];
        // membuat pengumuman data
        Surat::create($data);
        return redirect('/dashboard/surat')->with('success', 'Berhasil membuat surat baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        // jika bukan admin
        if (!auth()->user()->is_admin) {
            return view('dashboard.surat.show', [
                'title' => 'Pengajuan Surat',
                'navbar_params' => 'surat',
                'surat' => $surat->where('id', $surat->id)->first(),
                'mahasiswa' => Mahasiswa::where('nim', $surat->mahasiswa_id)->first(),
                'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
                'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            ]);
        }
        // jika admin
        return view('dashboard.surat.show', [
            'title' => 'Pengajuan Surat',
            'navbar_params' => 'surat',
            'surat' => $surat->where('id', $surat->id)->first(),
            'mahasiswa' => Mahasiswa::where('nim', $surat->mahasiswa_id)->first(),
            'count_aduan' => Aduan::where('status', 'Belum direspon')->count(),
            'count_surat' => Surat::where('status', 'Belum direspon')->count(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        // ambil nilai update
        $data['status'] = $request->input('status');
        $data['catatan'] = $request->input('catatan');

        // update data surat
        $surat->where('id', $surat->id)->update($data);

        return redirect('/dashboard/surat')->with('success', 'Berhasil update surat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function preview(Request $request)
    {
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileContents = file_get_contents($file->getRealPath());
            // Mengonversi byte menjadi base64
            $base64Image = base64_encode($fileContents);
            // Mendapatkan tipe konten (MIME type) dari file
            $mime = $file->getClientMimeType();
        }
        if ($request->file('image_izin')) {
            $file = $request->file('image_izin');
            $fileContentsIzin = file_get_contents($file->getRealPath());
            // Mengonversi byte menjadi base64
            $base64ImageIzin = base64_encode($fileContentsIzin);
            // Mendapatkan tipe konten (MIME type) dari file
            $mimeIzin = $file->getClientMimeType();
        }
        $surat = $request->input('surat');
        $asrama = $request->input('asrama');
        $jenis_kelamin = $request->input('jenis_kelamin');

        $asramaText = '';
        $suratText = '';
        $jenis_kelaminText = '';

        // Filter Jenis Kelamin
        if ($jenis_kelamin === 'P') {
            $jenis_kelaminText = 'Perempuan';
        } else {
            $jenis_kelaminText = 'Laki-Laki';
        }

        // Filter Asrama
        if ($asrama === 'AL') {
            $asramaText = 'Asrama Anggur';
        } elseif ($asrama === 'KH') {
            $asramaText = 'Asrama Salak';
        } elseif ($asrama === 'PT') {
            $asramaText = 'Asrama Duren';
        } elseif ($asrama === 'RS') {
            $asramaText = 'Asrama Apel';
        } else {
            $asramaText = 'Asrama tidak dikenal';
        }

        // Filter Surat
        if ($surat === 'Kontrak') {
            $suratText = 'Kontrak';
            $dataToSend = [
                'surat' => $suratText,
                'nim' => $request->nim,
                'nik' => $request->nik,
                'nama' => $request->nama,
                'program_studi' => $request->program_studi,
                'tempat_tanggal_lahir' => $request->tempat_tanggal_lahir,
                'golongan_darah' => $request->golongan_darah,
                'jenis_kelamin' => $jenis_kelaminText,
                'agama' => $request->agama,
                'alamat_asli' => $request->alamat_asli,
                'no_tlp' => $request->no_tlp,
                'email' => $request->email,
                'nama_orang_tua' => $request->nama_orang_tua,
                'pekerjaan_orang_tua' => $request->pekerjaan_orang_tua,
                'alamat_orang_tua' => $request->alamat_orang_tua,
                'no_tlp_orang_tua' => $request->no_tlp_orang_tua,
                'tempat_tanggal_surat' => $request->tempat_tanggal_surat,
                'mime' => $mime,
                'base64Image' => $base64Image,
            ];
        } elseif ($surat === 'Izin') {
            $suratText = 'Izin';
            $dataToSend = [
                'surat' => $suratText,
                'nim' => $request->nim,
                'nama' => $request->nama,
                'asrama' => $asramaText,
                'alasan' => $request->alasan,
                'alamat' => $request->alamat,
                'tempat_tanggal_surat_izin' => $request->tempat_tanggal_surat_izin,
                'mimeIzin' => $mimeIzin,
                'base64ImageIzin' => $base64ImageIzin,
            ];
        }



        return view('dashboard.surat.preview', [
            'title' => 'Pengajuan Surat',
            'navbar_params' => 'Buat Pengajuan',
            'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
        ])->with($dataToSend);
    }

    public function kirimPengajuan(Request $request)
    {

        $surat = $request->input('surat');
        $nama = $request->input('nama');
        $nim = $request->input('nim');
        // Surat Izin
        $asramaText = $request->input('asrama');
        $alasan = $request->input('alasan');
        $alamat = $request->input('alamat');
        $tempat_tanggal_surat_izin = $request->input('tempat_tanggal_surat_izin');
        $mimeIzin = $request->input('mimeIzin');
        $base64ImageIzin = $request->input('base64ImageIzin');
        // Surat Kontrak
        $nik = $request->input('nik');
        $program_studi = $request->input('program_studi');
        $tempat_tanggal_lahir = $request->input('tempat_tanggal_lahir');
        $golongan_darah = $request->input('golongan_darah');
        $jenis_kelamin = $request->input('jenis_kelamin');
        $agama = $request->input('agama');
        $alamat_asli = $request->input('alamat_asli');
        $no_tlp = $request->input('no_tlp');
        $email = $request->input('email');
        $nama_orang_tua = $request->input('nama_orang_tua');
        $pekerjaan_orang_tua = $request->input('pekerjaan_orang_tua');
        $alamat_orang_tua = $request->input('alamat_orang_tua');
        $no_tlp_orang_tua = $request->input('no_tlp_orang_tua');
        $tempat_tanggal_surat = $request->input('tempat_tanggal_surat');
        $mime = $request->input('mime');
        $base64Image = $request->input('base64Image');

        if ($surat === 'Kontrak') {
            $pdf = PDF::loadView('dashboard.surat.pdf.kontrak', compact('nama', 'nim', 'nik', 'program_studi', 'tempat_tanggal_lahir', 'golongan_darah', 'jenis_kelamin', 'agama', 'alamat_asli', 'no_tlp', 'email', 'nama_orang_tua', 'pekerjaan_orang_tua', 'alamat_orang_tua', 'no_tlp_orang_tua', 'tempat_tanggal_surat', 'mime', 'base64Image'));
        } else {
            $pdf = PDF::loadView('dashboard.surat.pdf.izin', compact('nama', 'nim', 'asramaText', 'alasan', 'alamat', 'tempat_tanggal_surat_izin', 'mimeIzin', 'base64ImageIzin'));
        }

        // Convert the PDF to data URI
        $pdfDataUri = "data:application/pdf;base64," . base64_encode($pdf->output());

        return view('dashboard.surat.send', [
            'pdfDataUri' => $pdfDataUri,
            'surat' => $surat,
            'title' => 'Pengajuan Surat',
            'navbar_params' => 'Buat Pengajuan',
            'count_surat' => Surat::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
            'count_aduan' => Aduan::where('mahasiswa_id', auth()->user()->username)->whereNotIn('status', ['Belum direspon'])->count(),
        ]);
    }
}