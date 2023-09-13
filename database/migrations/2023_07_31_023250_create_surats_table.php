<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_dokumen', 10);
            $table->string('nama_file');
            $table->enum('status', ['Belum direspon', 'Diterima', 'Ditolak'])->default('Belum direspon');
            $table->string('catatan')->nullable();
            $table->string('mahasiswa_id', 20);
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}