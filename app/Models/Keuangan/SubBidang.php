<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubBidang extends Model
{
    use HasFactory;
    protected $table = 'sub_bidang';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'bidang_id',
    ];
    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
