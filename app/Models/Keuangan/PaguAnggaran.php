<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaguAnggaran extends Model
{
    use HasFactory;
    protected $table = 'pagu_anggaran';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'pagu_anggaran',
        'bidang_id',
        'sub_bidang_id',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
    public function sub_bidang(): BelongsTo
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id');
    }
    public function sumber_anggaran(): BelongsTo
    {
        return $this->belongsTo(SumberAnggaran::class, 'name');
    }
    public function pmk(): BelongsTo 
    {
        return $this->belongsTo(Pmk::class, 'pmk_id');
    }
}
