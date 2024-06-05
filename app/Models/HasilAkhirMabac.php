<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilAkhirMabac extends Model
{
    use HasFactory;

    protected $table = 'hasil_akhir_mabac';

    protected $fillable = [
        'kode',
        'NIK',
        'nama',
        'total',
        'ranking',
        'tanggal', 
    ];
}
