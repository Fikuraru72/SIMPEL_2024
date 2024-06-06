<?php
namespace Database\Factories;

use App\Models\Bansos;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class BansosFactory extends Factory
{
    protected $model = Bansos::class;

    public function definition()
    {
        return [
            'pendapatan' => $this->faker->randomElement(['1', '2', '3']),
            'tanggungan' => $this->faker->randomElement(['1', '2', '3']),
            'pbb' => $this->faker->randomElement(['1', '2', '3']),
            'tagihanAir' => $this->faker->randomElement(['1', '2', '3']),
            'tagihanListrik' => $this->faker->randomElement(['1', '2', '3']),
            'status' => $this->faker->randomElement(['terkonfirmasi', 'belum terkonfirmasi']),
            'id_penduduk' => Penduduk::factory(),
        ];
    }
}
