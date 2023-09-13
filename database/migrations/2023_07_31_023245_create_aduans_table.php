<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aduans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subjek', 100);
            $table->text('deskripsi');
            $table->string('aduan_foto');
            $table->enum('status', ['Belum direspon', 'Sudah direspon'])->default('Belum direspon');
            $table->string('catatan')->nullable();
            $table->string('mahasiswa_id', 20);
            $table->foreign('mahasiswa_id')->references('nim')->on('mahasiswas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('aduans');
    }
}