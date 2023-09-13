@extends('dashboard.layouts.main')

@section('container')
<div class="px-4">
    <div class="inline-flex">
        <button class="px-6 py-3 bg-blue-300 text-white text-sm font-medium rounded-l-lg" disabled>
            Buat
        </button>
        <button class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium ">
            Review
        </button>
        <button class="px-6 py-3 bg-blue-300 text-white text-sm font-medium rounded-r-lg" disabled>
            Kirim
        </button>
    </div>


    <form class="space-y-6  max-w-4xl" action="{{ route('surat.kirimPengajuan') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-2 gap-6">
            <div>
                <div class="mb-5">
                    <label for="surat" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Surat</label>
                    <input type="text" name="surat" id="surat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $surat }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="nim" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">NIM</label>
                    <input type="text" name="nim" id="nim" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $nim }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="nama" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Nama</label>
                    <input type="text" name="nama" id="nama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $nama }}" readonly>
                </div>
                @if ($surat === 'Izin')
                <div class="mb-5">
                    <label for="asrama" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Asrama</label>
                    <input type="text" name="asrama" id="asrama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $asrama }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="alasan" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Alasan</label>
                    <input type="text" name="alasan" id="alasan" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $alasan }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="alamat" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $alamat }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="tempat_tanggal_surat_izin" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Tempat dan Tanggal Surat</label>
                    <input type="text" name="tempat_tanggal_surat_izin" id="tempat_tanggal_surat_izin" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $tempat_tanggal_surat_izin }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="image" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Tanda Tangan (Gambar)</label>
                    <img style="width: 200px; height: 200px;" src="data:{{ $mimeIzin }};base64,{{ $base64ImageIzin }}" alt="Gambar">
                </div>
                <input type="hidden" name="mimeIzin" value="{{ $mimeIzin }}">
                <input type="hidden" name="base64ImageIzin" value="{{ $base64ImageIzin }}">
                @elseif ($surat === 'Kontrak')
                <div class="mb-5">
                    <label for="nik" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">NIK</label>
                    <input type="text" name="nik" id="nik" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $nik }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="program_studi" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Program Studi</label>
                    <input type="text" name="program_studi" id="program_studi" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $program_studi }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="tempat_tanggal_lahir" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Tempat Tanggal Lahir</label>
                    <input type="text" name="tempat_tanggal_lahir" id="tempat_tanggal_lahir" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $tempat_tanggal_lahir }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="golongan_darah" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Golongan Darah</label>
                    <input type="text" name="golongan_darah" id="golongan_darah" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $golongan_darah }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="jenis_kelamin" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Jenis Kelamin</label>
                    <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $jenis_kelamin }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="agama" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Agama</label>
                    <input type="text" name="agama" id="agama" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $agama }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="alamat_asli" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Alamat Asli</label>
                    <input type="text" name="alamat_asli" id="alamat_asli" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $alamat_asli }}" readonly>
                </div>
                @endif
            </div>
            @if ($surat === 'Kontrak')
            <div>
                <div class="mb-5">
                    <label for="no_tlp" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">No. tlp</label>
                    <input type="text" name="no_tlp" id="no_tlp" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $no_tlp}}" readonly>
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Email</label>
                    <input type="text" name="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value="{{ $email }}" readonly>
                </div>
                <div class="mb-5">
                    <label for="nama_orang_tua" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Nama Orang tua/wali</label>
                    <input type="text" name="nama_orang_tua" id="nama_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $nama_orang_tua }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="pekerjaan_orang_tua" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Pekerjaan Orang tua/wali</label>
                    <input type="text" name="pekerjaan_orang_tua" id="pekerjaan_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $pekerjaan_orang_tua }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="alamat_orang_tua" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Alamat Orang tua/wali</label>
                    <input type="text" name="alamat_orang_tua" id="alamat_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $alamat_orang_tua }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="no_tlp_orang_tua" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">No. Tlp Orang tua/wali</label>
                    <input type="text" name="no_tlp_orang_tua" id="no_tlp_orang_tua" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $no_tlp_orang_tua }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="tempat_tanggal_surat" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Tempat dan Tanggal Surat</label>
                    <input type="text" name="tempat_tanggal_surat" id="tempat_tanggal_surat" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border-1 border-gray-300 appearance-none" value=" {{ $tempat_tanggal_surat }} " readonly>
                </div>
                <div class="mb-5">
                    <label for="image" class="mb-2 text-sm font-medium text-blue-500 dark:text-white">Tanda Tangan (Gambar)</label>
                    <img style="width: 200px; height: 200px;" src="data:{{ $mime }};base64,{{ $base64Image }}" alt="Gambar">
                </div>
                <input type="hidden" name="mime" value="{{ $mime }}">
                <input type="hidden" name="base64Image" value="{{ $base64Image }}">
            </div>
            @endif
        </div>

        <!-- Tampilkan data lainnya sesuai dengan yang Anda kirim -->

        <div class="flex items-center space-x-2 ">
            <button id="backButton" type="button" class="flex items-center text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 p-1">
                    <path fill-rule="evenodd" d="M9.53 2.47a.75.75 0 010 1.06L4.81 8.25H15a6.75 6.75 0 010 13.5h-3a.75.75 0 010-1.5h3a5.25 5.25 0 100-10.5H4.81l4.72 4.72a.75.75 0 11-1.06 1.06l-6-6a.75.75 0 010-1.06l6-6a.75.75 0 011.06 0z" clip-rule="evenodd" />
                </svg>
                Kembali
            </button>
            <button type="submit" class="flex items-center text-blue-500 hover:text-white border border-blue-500 hover:bg-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">
                Lanjut
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 p-1">
                    <path fill-rule="evenodd" d="M14.47 2.47a.75.75 0 011.06 0l6 6a.75.75 0 010 1.06l-6 6a.75.75 0 11-1.06-1.06l4.72-4.72H9a5.25 5.25 0 100 10.5h3a.75.75 0 010 1.5H9a6.75 6.75 0 010-13.5h10.19l-4.72-4.72a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </form>
</div>
<script>
    document.getElementById('backButton').addEventListener('click', function() {
        history.back(); // Kembali ke halaman sebelumnya
    });

</script>
@endsection
