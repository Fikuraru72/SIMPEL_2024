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
            $table->enum('JenisKelamin', ['Pria', 'Wanita']);
            $table->enum('rt',['1','2','3','4','5','6','7','8','9','10']);
            $table->string('Alamat');


            $table->timestamps();

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
