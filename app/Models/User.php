<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;   

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_user',
        'username',
        'password',
        'level',
        'id_penduduk',
    ];

    // public function penduduk (){
    //     return $this->hashMany(Penduduk::class, 'id_user', 'id_user');
    // }

    public function penduduk(): BelongsTo{
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id_penduduk');
    }

    public function pengaduan (){
        return $this->hashMany(Pengaduan::class, 'id_user', 'id_user');
    }

    public function getDecryptedPassword()
    {
        try {
            return Crypt::decryptString($this->password);
        } catch (DecryptException $e) {
            return null; // Atau handle exception sesuai kebutuhan
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
