<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('user')->insert([
                [
                    'username' => 'admin',
                    'password' => Hash::make('password'),
                    'level' => 'admin',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'penduduk',
                    'password' => Hash::make('password'),
                    'level' => 'penduduk',
                    'id_penduduk' => 1, // Sesuaikan dengan ID yang ada di tabel 'penduduk'
                ],
                [
                    'username' => 'rt1',
                    'password' => Hash::make('password'),
                    'level' => '1',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt2',
                    'password' => Hash::make('password'),
                    'level' => '2',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt3',
                    'password' => Hash::make('password'),
                    'level' => '3',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt4',
                    'password' => Hash::make('password'),
                    'level' => '4',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt5',
                    'password' => Hash::make('password'),
                    'level' => '5',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt6',
                    'password' => Hash::make('password'),
                    'level' => '6',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt7',
                    'password' => Hash::make('password'),
                    'level' => '7',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt8',
                    'password' => Hash::make('password'),
                    'level' => '8',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt9',
                    'password' => Hash::make('password'),
                    'level' => '9',
                    'id_penduduk' => null,
                ],
                [
                    'username' => 'rt10',
                    'password' => Hash::make('password'),
                    'level' => '10',
                    'id_penduduk' => null,
                ],
            ]);
        }
}

