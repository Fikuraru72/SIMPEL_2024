<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kriteria extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'kriteria',
        'bobot',
        'tipe',
        'create_at',
        'update_at'
    ];
}
