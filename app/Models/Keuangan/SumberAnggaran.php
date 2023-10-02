<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SumberAnggaran extends Model
{
    use HasFactory;
    protected $table = 'sumber_anggaran';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'bidang_id',
        'sub_bidang_id',
    ];

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
    
    public function sub_bidang() : belongsTo 
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id');
    }
    
    public function pmk() : belongsTo 
    {
        return $this->belongsTo(Pmk::class, 'pmk_id');
    }
}