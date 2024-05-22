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
        'Alamat',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

}
