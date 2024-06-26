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
                $table->text('subjek');
                $table->text('pesan');
                $table->string('rt');
                $table->timestamps();
            });
        }

        public function down(): void
        {
            Schema::dropIfExists('pengaduan');
        }
    };
