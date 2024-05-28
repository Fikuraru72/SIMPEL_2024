<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKeluarga extends Model
{   
    protected $table = 'data_keluarga';

    protected $fillable = [
        'id_penduduk',
        'NIK',
        'nama',
        'TTL',
        'Agama',
        'Jenis Kelamin'
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
