    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        public function up(): void
        {
            Schema::create('pengaduan', function (Blueprint $table) {
                $table->id('id_pengaduan');
                $table->string('nama');
                $table->string('nik');
                $table->text('pesan');
                $table->string('rt');
                $table->timestamps();
                $table->unsignedBigInteger('id_user')->index();
                $table->foreign('id_user')->references('id')->on('akun');
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('pengaduan');
        }
    };