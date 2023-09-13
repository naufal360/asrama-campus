<!DOCTYPE html>
<html>
<head>
    <title>Surat Izin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: center;
        }

        .content {
            margin-top: 20px;
            line-height: 1.5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 5px;
        }

        .label {
            width: 30%;
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
        <div class="title" style="font-size: 24px; font-weight: bold;">SURAT IZIN KELUAR ASRAMA</div>
    </div>

    <div class="content" style="margin-top: 30px">
        <p>Jakarta, 2022</p>
        <p>Dengan ini Saya mengajukan IZIN (Bermalam) meninggalkan Asrama:</p>

        <table style="margin-left: 15px; margin-right:15px">
            <tr>
                <td class="label">Nama</td>
                <td>: {{ $nama }}</td>
            </tr>
            <tr>
                <td class="label">NIM</td>
                <td>: {{ $nim }}</td>
            </tr>
            <tr>
                <td class="label">Asrama</td>
                <td>: {{ $asramaText }}</td>
            </tr>
            <tr>
                <td class="label">Alasan</td>
                <td>: {{ $alasan }}</td>
            </tr>
            <tr>
                <td class="label">Alamat yang dituju</td>
                <td>: {{ $alamat }}</td>
            </tr>
        </table>

        <p>Saya akan berjanji untuk menaati segala peraturan yang berlaku dan menerima segala sanksi yang diberikan jika terbukti saya melakukan pelanggaran.</p>
        <p>Demikian permohonan ini saya sampaikan, atas perhatian Bapak/Ibu, saya ucapkan terima kasih.</p>
        <br>
        <div style="margin-left: 70%">
            <div>{{ $tempat_tanggal_surat_izin }}</div>
            <div>Penghuni,</div>
            <img style="width: 100px; height: 100px;" src="data:{{ $mimeIzin }};base64,{{ $base64ImageIzin }}" alt="Gambar">
            <div>{{ $nama }}</div>
        </div>
    </div>
</body>
</html>
