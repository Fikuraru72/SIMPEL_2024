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
        Schema::create('hasil_akhir_mabac', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('kode', 20);
            $table->string('NIK');
            $table->string('nama', 255);
            $table->decimal('total', 10, 2);
            $table->integer('ranking');
            $table->string('tanggal', 40);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_akhir_mabac');
    }
};
