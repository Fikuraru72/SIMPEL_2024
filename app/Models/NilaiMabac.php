<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiMabac extends Model
{
    use HasFactory;

    protected $table = 'nilai_mabac';

    protected $fillable = [
    'NIK',
    'nama',
    'total',
    'ranking',
    'tanggal',
];
}
