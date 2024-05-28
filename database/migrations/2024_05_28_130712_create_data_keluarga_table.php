<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('data_keluarga', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penduduk');
            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk');
            $table->string('NIK');
            $table->string('nama');
            $table->string('TTL');
            $table->string('Agama');
            $table->enum('JenisKelamin', ['Pria', 'Wanita']);
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
        Schema::dropIfExists('data_keluarga');
    }
};