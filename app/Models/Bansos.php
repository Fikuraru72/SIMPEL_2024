<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bansos extends Model
{
    use HasFactory;
    protected $table = 'bansos';
    protected $primaryKey = 'id_alternatif';

    protected $fillable = [
        'id_alternatif',
        'pendapatan',
        'tanggungan',
        'pbb',
        'tagihanAir',
        'tagihanListrik',
        'status',
        'id_penduduk',
        'updated_at',
        'created_at'
    ];

    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id_penduduk');
    }

}
