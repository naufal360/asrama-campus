<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Asrama;
use App\Models\Jurusan;
use App\Models\Biodata;
use App\Models\Surat;
use App\Models\Mahasiswa;
use App\Models\Aduan;
use App\Models\Pengumumans;
use App\Models\Peraturan;
use App\Models\Dokumentasi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // seeder user
        // admin
        User::create([
            'username' => env('ADMIN_SEED_USERNAME'),
            'password' => bcrypt(env('ADMIN_SEED_PASSWORD')),
            'is_admin' => true,
        ]);
        // mahasiswa
        User::create([
            'username' => '2231244777',
            'password' => bcrypt(env('USER_DEFAULT_PASSWORD')),
        ]);
        User::create([
            'username' => '1111111221',
            'password' => bcrypt(env('USER_DEFAULT_PASSWORD')),
        ]);
        User::create([
            'username' => '11290106',
            'password' => bcrypt(env('USER_DEFAULT_PASSWORD')),
        ]);
        User::create([
            'username' => '2222222233',
            'password' => bcrypt(env('USER_DEFAULT_PASSWORD')),
        ]);

        // seeder asrama
        Asrama::create([
            'nama' => 'Anggur',
        ]);
        Asrama::create([
            'nama' => 'Salak',
        ]);
        Asrama::create([
            'nama' => 'Duren',
        ]);
        Asrama::create([
            'nama' => 'Apel',
        ]);

        // seeder jurusan
        Jurusan::create([
            'nama' => 'Ilmu Komputer',
        ]);
        Jurusan::create([
            'nama' => 'Ekonomi',
        ]);
        Jurusan::create([
            'nama' => 'Teknik Elektronika',
        ]);
        Jurusan::create([
            'nama' => 'Komunikasi',
        ]);

        // seeder mahasiswa
        Mahasiswa::create([
            'nim' => '2231244777',
            'nama' => 'Ahmad Junaidi',
            'profil_foto' => 'profil_foto/profil.jpg',
            'alamat' => 'jalan kenangan sama mantan',
            'tahun' => '2019',
            'periode_asrama' => '2020',
            'email' => 'junaidi@gmail.com',
            'dosen_wali' => 'Herry Osborn',
            'nama_tugas_akhir' => 'Model CNN deteksi tanaman',
            'user_id' => 2,
            'jurusan_id' => 1,
            'asrama_id' => 1,
        ]);
        Mahasiswa::create([
            'nim' => '1111111221',
            'nama' => 'Ade Junaidi',
            'profil_foto' => 'profil_foto/profil.jpg',
            'alamat' => 'jalan kenangan sama mantan',
            'tahun' => '2020',
            'periode_asrama' => '2020',
            'email' => 'ade@gmail.com',
            'dosen_wali' => 'Herry Osborn',
            'nama_tugas_akhir' => 'Model sentimen analisis',
            'user_id' => 3,
            'jurusan_id' => 1,
            'asrama_id' => 2,
        ]);
        Mahasiswa::create([
            'nim' => '11290106',
            'nama' => 'Andri',
            'profil_foto' => 'profil_foto/profil.jpg',
            'alamat' => 'jalan kenangan sama mantan',
            'tahun' => '2021',
            'periode_asrama' => '2021',
            'email' => 'andri@gmail.com',
            'dosen_wali' => 'Herry Osborn',
            'nama_tugas_akhir' => 'Model NLP sentimen analisis',
            'user_id' => 4,
            'jurusan_id' => 3,
            'asrama_id' => 1,
        ]);
        Mahasiswa::create([
            'nim' => '222222223333',
            'nama' => 'Hendra',
            'profil_foto' => 'profil_foto/profil.jpg',
            'alamat' => 'jalan kenangan sama mantan',
            'tahun' => '2021',
            'periode_asrama' => '2021',
            'email' => 'hendra@gmail.com',
            'dosen_wali' => 'Herry Osborn',
            'nama_tugas_akhir' => 'Model NLP sentimen analisis',
            'user_id' => 5,
            'jurusan_id' => 3,
            'asrama_id' => 1,
        ]);

        // seeder dokumentasi
        Dokumentasi::create([
            'asrama_id' => 1,
            'nama_asrama' => 'Asrama Anggur',
            'foto' => 'dokumentasi_foto/a.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Apel',
            'foto' => 'dokumentasi_foto/b.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 1,
            'nama_asrama' => 'Asrama Anggur',
            'foto' => 'dokumentasi_foto/c.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Apel',
            'foto' => 'dokumentasi_foto/d.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 1,
            'nama_asrama' => 'Asrama Anggur',
            'foto' => 'dokumentasi_foto/e.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Apel',
            'foto' => 'dokumentasi_foto/f.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Apel',
            'foto' => 'dokumentasi_foto/g.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 1,
            'nama_asrama' => 'Asrama Anggur',
            'foto' => 'dokumentasi_foto/h.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Apel',
            'foto' => 'dokumentasi_foto/i.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);
        Dokumentasi::create([
            'asrama_id' => 4,
            'nama_asrama' => 'Asrama Saleh',
            'foto' => 'dokumentasi_foto/j.png',
            'deskripsi' => "Kegiatan malam keakraban yang diselenggarakan dilapangan Universitas."
        ]);

        // seeder surat
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '2231244777',
        ]);
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '2231244777',
        ]);
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '1111111221',
        ]);
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '11290106',
        ]);
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '2231244777',
        ]);
        Surat::create([
            'jenis_dokumen' => 'Izin',
            'nama_file' => 'assets/img/pdf_output/202308151954.pdf',
            'mahasiswa_id' => '11290106',
        ]);

        // seeder aduan
        Aduan::create([
            'subjek' => 'ac rusak',
            'deskripsi' => 'sudah hampir 3 bulan tidak menyala',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '2231244777'
        ]);
        Aduan::create([
            'subjek' => 'pintu jebol',
            'deskripsi' => 'sudah hampir 3 bulan tidak ada pintu',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '11290106'
        ]);
        Aduan::create([
            'subjek' => 'wc banyak kecoa',
            'deskripsi' => 'sudah hampir 3 bulan banyak kecoa',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '1111111221'
        ]);
        Aduan::create([
            'subjek' => 'Fasilitas Rusak',
            'deskripsi' => 'Kran air yang berada di kamar 3 patah, sehingga menyebabkan air rembes sampai ke dalam kamar. Semoga pihak asrama menanganinya dengan segera.',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '2231244777'
        ]);
        Aduan::create([
            'subjek' => 'Lingkungan',
            'deskripsi' => 'Sampah berserakan di depan asrama, dikarenakan tukang sampah yang tidak tepat waktu dalam mengambil sampah. Mohon tegurannya bagi tukang sampah agar lebih konsisten lagi.',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '11290106'
        ]);

        Aduan::create([
            'subjek' => 'Jadwal Piket',
            'deskripsi' => 'sudah hampir 3 bulan jadwal piket tidak jalan',
            'aduan_foto' => 'aduan/test.jpg',
            'mahasiswa_id' => '2231244777'
        ]);

        // seeder pengumuman
        Pengumumans::create([
            'judul' => 'Pembayaran Iuran Yayasan Orang Tua',
            'deskripsi' => "Sebagai informasi kembali bahwa adanya aktivitas nyata dari YOM adalah :
1. Bantuan Rawat Inap Mahasiswa : Rp 500.000,-
2. Santunan Duka Orang Tua Mahasiswa/I : Rp. 1.000.000,-
3. Santunan Duka Mahasiswa/I dan Dosen : Rp 500.000,-
                ",
        ]);
        Pengumumans::create([
            'judul' => 'Sosialisasi Kegiatan Mahasiswa',
            'deskripsi' => "Sosialisai terhadap penggunaan sampah plastik dilingkungan. Bersama ini, kami mengundang Saudara/i untuk hadir diacara yang akan diselenggarakan pada:

Hari/Tanggal : Rabu, 25 Juli 2023

Pukul : 09:00 - 11:40 WIB

Tempat : Auditorium Universitas Pemateri dan Narasumber
            ",
        ]);
        Pengumumans::create([
            'judul' => 'Campus Healt Monitoring',
            'deskripsi' => "Kepada Mahasiswa/I Universitas kami dari Fungsi Pelayanan Asrama mengharapkan bantuannya untuk dapat memperbarui status vaksinasi diri anda pada akun SIUP. Ditengah wabah Covid – 19 yang belum usai kami menghimbau pentingnya vaksinasi booster untuk menjaga imunitas tubuh dan proteksi diri anda. Jika terdapat kendala dalam pembaruan status vaksinasi dapat menghubungi kami.",
            'created_at' => '2023-08-01 15:25:26',
        ]);
        Pengumumans::create([
            'judul' => 'Catatan',
            'deskripsi' => "Mahasiswa dapat mulai datang ke asrama sejak tanggal 10 Agustus 2023.",
            'created_at' => '2023-08-01 15:25:26',
        ]);

        // seeder peraturan
        Peraturan::create([
            'judul' => 'Pasal 1 Kewajiban Negara:',
            'deskripsi' => "
1. Membayar uang UHA selama satu tahun dan uang kegiatan asrama.
2. Menaati peraturan yang telah dibuat dan ditetapkan oleh Pengurus Rumah Tangga Asrama
3. Melaksanakan piket (jaga lobi) dengan rutin sesuai dengan jadwal yang telah ditentukan oleh Pengurus
Rumah Tangga Asrama.
4. Menjaga barang inventaris asrama.
5. Berpartisipasi aktif dalam semua kegiatan yang diadakan asrama.
            ",
        ]);
        Peraturan::create([
            'judul' => 'Pasal 2 Kewajiban Negara:',
            'deskripsi' => "
1. Membayar uang UHA selama satu tahun dan uang kegiatan asrama.
2. Menaati peraturan yang telah dibuat dan ditetapkan oleh Pengurus Rumah Tangga Asrama
3. Melaksanakan piket (jaga lobi) dengan rutin sesuai dengan jadwal yang telah ditentukan oleh Pengurus
Rumah Tangga Asrama.
4. Menjaga barang inventaris asrama.
5. Berpartisipasi aktif dalam semua kegiatan yang diadakan asrama.
            ",
        ]);
    }
}