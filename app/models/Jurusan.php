<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
	protected $guarded = ['id'];

    protected $with = ['mahasiswas'];

    public function mahasiswas() {
        return $this->hasMany(Mahasiswa::class, 'nim', 'jurusan_id');
    }
}
