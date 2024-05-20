<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('password'),
                'rt' => '1',
                'Level' => '3',
                'remember_token' => null,
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('password1'),
                'rt' => '2',
                'Level' => '1',
                'remember_token' => null,
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password2'),
                'rt' => '3',
                'Level' => '2',
                'remember_token' => null,
            ],
        ]);
    }
}
