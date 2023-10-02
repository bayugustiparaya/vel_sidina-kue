<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pmk extends Model
{
    use HasFactory;
    protected $table = 'pmk';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'pagu_anggaran',
        'bidang_id',
        'sub_bidang_id',
        'sumber_anggaran_id',
        'pagu_anggaran_id',
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
        return $this->belongsTo(SumberAnggaran::class, 'sumber_anggaran_id');
    }

    public function pagu_anggaran(): BelongsTo
    {
        return $this->belongsTo(PaguAnggaran::class, 'pagu_anggaran_id');
    }
}
