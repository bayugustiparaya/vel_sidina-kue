<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $table = 'wil_districts';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'regency_id',
        'name',
    ];

    // relasi
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }
}
