<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Regency extends Model
{
    use HasFactory;

    protected $table = 'wil_regencies';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'province_id',
        'name',
    ];

    // relasi
    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
