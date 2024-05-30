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
        DB::table('akun')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('password'),
                'Level' => '3',
                'id_penduduk' => '1',
                'remember_token' => null,
            ],
            [
                'username' => 'user1',
                'password' => Hash::make('password1'),
                'Level' => '1',
                'id_penduduk' => '2',
                'remember_token' => null,
            ],
            [
                'username' => 'user2',
                'password' => Hash::make('password2'),
                'Level' => '2',
                'id_penduduk' => '3',
                'remember_token' => null,
            ],
        ]);
    }
}
