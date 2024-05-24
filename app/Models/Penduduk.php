<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Penduduk extends Model
{
    protected $table = 'penduduk';
    protected $primarykey = 'id_penduduk';

    protected $fillable = [
        'id_penduduk',
        'NIK',
        'NoKK',
        'nama',
        'TTL',
        'Agama',
        'Jenis Kelamin',
        'rt',
        'Alamat',
        'id_status',
        'id_user'
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function status(): BelongsTo{
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    public function  bansos (){
        return $this->hashMany(Bansos::class, 'id_penduduk', 'id_penduduk');
    }

}
