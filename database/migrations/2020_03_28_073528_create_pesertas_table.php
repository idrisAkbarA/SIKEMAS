<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesertas', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->string('nik');
            $table->string('nama');
            $table->enum('jk', ['lk', 'pr']);
            $table->string('alamat');
            $table->string('hp');
            $table->string('pekerjaan');
            $table->string('ket');
            $table->bigInteger('id_kegiatan')->unsigned();
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatans');
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
        Schema::dropIfExists('pesertas');
    }
}
