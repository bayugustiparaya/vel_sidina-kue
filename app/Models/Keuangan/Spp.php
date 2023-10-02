<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Spp extends Model
{
    use HasFactory;
    
    protected $table = 'spp';
    public $timestamps = true;
    protected $fillable = [
        'nama_kegiatan',
        'tahun',
        'bidang_id',
        'sub_bidang_id',
        'pmk_status_id',
        'user_id',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
    public function sub_bidang(): BelongsTo
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id');
    }
    public function spp_keperluan(): HasMany
    {
        return $this->hasMany(SppKeperluan::class,'spp_id');
    }
    public function pmk_status(): BelongsTo
    {
        return $this->belongsTo(PmkStatus::class,'pmk_status_id');
    }
    public function user(): BelongsTo
    {
        return $this->BelongsTo(\App\Models\User::class,'user_id');
    }
}
