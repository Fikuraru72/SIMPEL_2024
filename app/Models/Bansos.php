<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bansos extends Model
{
    protected $table = 'bansos';
    protected $primarykey = 'id_alternatif';

    protected $fillable = [
        'id_alternatif',
        'pendapatan',
        'tanggungan',
        'pbb',
        'tagihanAir',
        'tagihanListrik',
        'status',
        'id_penduduk'
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id_penduduk');
    }

}
