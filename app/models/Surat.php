<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
	use HasFactory;
	protected $guarded = ['id'];

	protected $with = ['mahasiswa'];

	public function mahasiswa()
	{
		return $this->belongsTo(Mahasiswa::class);
	}
}
