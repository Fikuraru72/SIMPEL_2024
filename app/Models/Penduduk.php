<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primaryKey = 'id_penduduk';

    protected $fillable = [
        'id_penduduk',
        'NIK',
        'NoKK',
        'nama',
        'TTL',
        'Agama',
        'JenisKelamin',
        'rt',
        'Alamat',
    ];

    public function user (){
        return $this->hasOne(User::class, 'id_penduduk', 'id_penduduk');
    }

    public function status(){
        return $this->hasOne(Status::class, 'id_penduduk', 'id_penduduk');
    }

    public function  bansos (){
        return $this->hasMany(Bansos::class, 'id_penduduk', 'id_penduduk');
    }

}
