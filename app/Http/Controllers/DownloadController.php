<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use File;


class DownloadController extends Controller
{
    //
    public function index(Request $request)
    {
        $filepath = public_path('storage/' . $request->input('filename'));
        $nim = $request->input('nim');
        $jenis_dokumen = $request->input('jenis');
        $filename = $jenis_dokumen . '_' .$nim . '.pdf'; // Add the .pdf extension to the filename
        $headers = array(
            'Content-Type: application/pdf',
            'Content-Disposition: attachment; filename="' . $filename . '"', // Set the Content-Disposition header
        );

        if ($filepath == '') {
            return redirect('/dashboard/surat')->with('failed', 'Failed to download pdf');
        }

        return response()->download($filepath, $filename, $headers);
    }
}