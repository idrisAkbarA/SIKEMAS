<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->bigIncrements('id_kegiatan')->unique();
            $table->string('nama_kel');
            $table->string('nama_kegiatan');
            $table->dateTime('tanggal_dari');
            $table->dateTime('tanggal_sampai');
            $table->string('tempat_kegiatan');
            $table->string('tujuan');
            $table->string('penyelenggara');
            $table->string('penanggung_jawab');
            $table->string('latar_belakang');
            $table->string('trainer');
            $table->string('cp_trainer');
            $table->string('uang_saku');
            $table->string('anggaran');
            $table->string('outcome');
            $table->string('foto1');
            $table->string('foto2');
            $table->string('foto3');
            $table->string('foto4');
            $table->json('peserta');
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
        Schema::dropIfExists('kegiatans');
    }
}
