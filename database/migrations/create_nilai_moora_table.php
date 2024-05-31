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
        Schema::create('nilai_moora', function (Blueprint $table) {
            $table->id();
            $table->float('total');
            $table->unsignedBigInteger('id_penduduk')->index();
            $table->timestamps();

            // Add foreign key constraint to link with 'penduduk' table
            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_moora');
    }
};
