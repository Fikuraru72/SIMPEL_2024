<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'id_status';

    protected $fillable = [
        'id_status',
        'status_nikah',
        'status_keluarga',
        'status_warga',
        'id_penduduk',
    ];

    // public function  penduduk (){
    //     return $this->hashMany(Penduduk::class, 'id_status', 'id_status');
    // }

    public function penduduk(): BelongsTo{
        return $this->belongsTo(penduduk::class, 'id_penduduk', 'id_penduduk');
    }
}
