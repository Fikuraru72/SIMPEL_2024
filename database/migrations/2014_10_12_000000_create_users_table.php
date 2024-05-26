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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username');
            $table->string('password');
            $table->enum('Level',['1','2','3']);
            $table->unsignedBigInteger('id_Penduduk');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_penduduk')->references('id_penduduk')->on('penduduk');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
