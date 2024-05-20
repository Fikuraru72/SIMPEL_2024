<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id('id_penduduk');
            $table->string('NIK');
            $table->string('NoKK');
            $table->string('nama');
            $table->string('TTL');
            $table->string('Agama');
            $table->enum('Jenis Kelamin', ['Pria', 'Wanita']);
            $table->string('Alamat');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_status');
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users');
            $table->foreign('id_status')->references('id_status')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
