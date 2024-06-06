<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Status;


class StatusTableSeeder extends Seeder
{
    public function run()
    {
        Status::factory()->count(50)->create();
    }
}
