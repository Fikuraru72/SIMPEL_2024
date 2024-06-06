<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatusFactory extends Factory
{
    protected $model = Status::class;

    public function definition()
    {
        return [
            'status_nikah' => $this->faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
            'status_keluarga' => $this->faker->randomElement(['Kepala Keluarga', 'Anggota Keluarga']),
            'status_warga' => $this->faker->randomElement(['Tinggal', 'Meninggal', 'Pindah']),
            'id_penduduk' => Penduduk::factory(),
        ];
    }
}

