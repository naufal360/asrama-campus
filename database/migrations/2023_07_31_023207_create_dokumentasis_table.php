<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumentasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_asrama');
            $table->string('foto');
            $table->text('deskripsi');
            // foreignId
            $table->unsignedInteger('asrama_id');
            $table->foreign('asrama_id')->references('id')->on('asramas')->onUpdate('cascade')->onDelete('cascade');;
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
        Schema::dropIfExists('dokumentasis');
    }
}