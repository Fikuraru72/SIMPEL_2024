<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BansosTableSeeder extends Seeder
{
    public function run()
    {
        Bansos::factory()->count(20)->create();
    }
}
