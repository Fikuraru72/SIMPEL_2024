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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id('id_alternatif');
            $table->enum('pendapatan',['1','2','3']);
            $table->enum('tanggungan',['1','2','3']);
            $table->enum('pbb',['1','2','3']);
            $table->enum('tagihanAir',['1','2','3']);
            $table->enum('tagihanListrik',['1','2','3']);
            $table->enum('status',['terkonfirmasi', 'belum terkonfirmasi'])->default('belum terkonfirmasi');;
            $table->unsignedBigInteger('id_penduduk')->index();
            $table->timestamps();

            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
