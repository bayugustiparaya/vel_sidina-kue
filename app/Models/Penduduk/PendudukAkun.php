<?php

namespace App\Models\Penduduk;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PendudukAkun extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'penduduk_id',
        'email',
        'name',
        'nomor_hp',
        'password',
        'pin',
        'is_active',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'penduduk_id' => 'integer',
        'is_active' => 'boolean',
        'is_verified' => 'boolean',
    ];

    // relasi
    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }
}
