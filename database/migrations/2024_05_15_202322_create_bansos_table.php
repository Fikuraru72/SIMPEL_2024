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
            $table->integer('pendapatan');
            $table->integer('tanggungan');
            $table->integer('pbb');
            $table->integer('tagihanAir');
            $table->integer('tagihanListrik');
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
