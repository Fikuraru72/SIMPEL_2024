<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendudukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penduduk')->insert([
            [
                'NIK' => '1234567890123456',
                'NoKK' => '1234567890123456',
                'nama' => 'John Doe',
                'TTL' => '1990-01-01',
                'Agama' => 'Islam',
                'Jenis Kelamin' => 'Pria',
                'rt' => '3',
                'Alamat' => 'Jl. Merdeka No.1',
                'id_user' => 1,
                'id_status' => 1,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],[
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Jane Smith',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '1',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
            [
                'NIK' => '2345678901234567',
                'NoKK' => '2345678901234567',
                'nama' => 'Purnomo',
                'TTL' => '1992-02-02',
                'Agama' => 'Kristen',
                'Jenis Kelamin' => 'Wanita',
                'rt' => '2',
                'Alamat' => 'Jl. Merdeka No.2',
                'id_user' => 2,
                'id_status' => 2,
            ],
        ]);
    }
}
