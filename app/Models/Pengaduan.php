<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
        'subjek',
        'pesan',
        'rt',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
