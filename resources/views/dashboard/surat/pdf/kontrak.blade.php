<!DOCTYPE html>
<html>
<head>
    <title>Surat Kontrak</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .content {
            margin-top: 20px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* table td {
            padding: 5px;
        } */

        .label {
            width: 40%;
        }

        h1 {
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 10px;
        }

        .logo {
            max-width: 100px;
            max-height: 100px;
            margin: 0 auto;
        }

    </style>
</head>
<body style="margin-left: 30px; margin-right: 30px">
    <div class="header" style="text-align: center;">
        <img src="{{ public_path('assets/logo.png') }}" alt="Logo" class="logo" style="margin-bottom: 20px;">
        <div class="title">SURAT KONTRAK</div>
        <div class="title" style="margin-top: 10px">TINGGAL DI ASRAMA UNIVERSITAS</div>
    </div>

    <div class="content" style="margin-top: 20px">
        <p>Saya yang bertanda tangan di bawah ini :</p>
        {{-- <p>Dengan ini Saya mengajukan IZIN (Bermalam) meninggalkan Asrama:</p> --}}

        <table>
            <tr>
                <td class="label">Nama Lengkap</td>
                <td>: {{ $nama }}</td>
            </tr>
            <tr>
                <td class="label">NIM</td>
                <td>: {{ $nim }}</td>
            </tr>
            <tr>
                <td class="label">NIK</td>
                <td>: {{ $nik }}</td>
            </tr>
            <tr>
                <td class="label">Program Studi</td>
                <td>: {{ $program_studi }}</td>
            </tr>
            <tr>
                <td class="label">Tempat, tanggal lahir</td>
                <td>: {{ $tempat_tanggal_lahir }}</td>
            </tr>
            <tr>
                <td class="label">Golongan Darah</td>
                <td>: {{ $golongan_darah }}</td>
            </tr>
            <tr>
                <td class="label">Jenis Kelamin</td>
                <td>: {{ $jenis_kelamin}}</td>
            </tr>
            <tr>
                <td class="label">Agama</td>
                <td>: {{ $agama }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Asli</td>
                <td>: {{ $alamat_asli }}</td>
            </tr>
            <tr>
                <td class="label">No. Telp/No.Hp</td>
                <td>: {{ $no_tlp }}</td>
            </tr>
            <tr>
                <td class="label">Alamat email</td>
                <td>: {{ $email }}</td>
            </tr>
            <tr>
                <td class="label">Nama Orang tua/wali</td>
                <td>: {{ $nama_orang_tua }}</td>
            </tr>
            <tr>
                <td class="label">Pekerjaan Orang tua/wali</td>
                <td>: {{ $pekerjaan_orang_tua }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Orang tua/wali</td>
                <td>: {{ $alamat_orang_tua }}</td>
            </tr>
            <tr>
                <td class="label">No. Telp/Hp Orang tua/wali</td>
                <td>: {{ $no_tlp_orang_tua }}</td>
            </tr>
        </table>

        <p>Dengan ini menyatakan dan menyetujui beberapa hal berikut :</p>
        <ol>
            <li>Bersedia tinggal di Asrama Universitas selama periode: Agustus 2022 s.d Juli 2023</li>
            <li>Status pembayaran sewa asrama adalah pemotongan langsung Rp 400.000,- (empat ratus ribu Rupiah) per bulan dari bantuan biaya hidup yang diberikan Universitas.</li>
            <li>Pembayaran sewa asrama yang telah dibayarkan, tidak dapat di klaim untuk pengembalian jika keluar atau mengundurkan diri dari asrama.</li>
        </ol>
        <p>Saya telah membaca, memahami dan menyetujui isi dari surat kontrak tinggal asrama dengan penuh kesadaran dan tanpa paksaan dari pihak manapun.</p>
        <br>
        <div style="margin-left: 70%">
            <div>{{ $tempat_tanggal_surat }}</div>
            <div>Penghuni,</div>
            <img style="width: 100px; height: 100px;" src="data:{{ $mime }};base64,{{ $base64Image }}" alt="Gambar">
            <div>{{ $nama }}</div>
        </div>
    </div>
</body>
</html>
