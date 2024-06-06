<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PendudukFactory extends Factory
{
    protected $model = Penduduk::class;

    public function definition()
    {
        return [
            'NIK' => $this->faker->unique()->numerify('################'),
            'NoKK' => $this->faker->unique()->numerify('################'),
            'nama' => $this->faker->name(),
            'TTL' => $this->faker->date(),
            'Agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'JenisKelamin' => $this->faker->randomElement(['Pria', 'Wanita']),
            'rt' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'Alamat' => $this->faker->address(),
        ];
    }
}
