<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nim';

    protected $fillable = [
        'nim',
        'nama',
        'profil_foto',
        'alamat',
        'tahun',
        'periode_asrama',
        'email',
        'dosen_wali',
        'nama_tugas_akhir',
        // foreignid
        'user_id',
        'jurusan_id',
        'asrama_id',
        'aduan_id',
        // 'biodata_id',
    ];

    protected $with = [
        'user',
        // 'biodata',
        'aduans',
        'surats',
        'jurusan',
        'asrama',
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

    // public function biodata()
	// {
    //     return $this->hasOne(Biodata::class, 'id', 'biodata_id');
	// }

    public function aduans()
	{
		return $this->hasMany(Aduan::class, 'mahasiswa_id');
	}

    public function surats()
	{
		return $this->hasMany(Surat::class, 'mahasiswa_id');
	}

    public function jurusan()
	{
		return $this->belongsTo(Jurusan::class);
	}

    public function asrama()
	{
        return $this->belongsTo(Asrama::class);
	}

}