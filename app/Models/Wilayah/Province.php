<?php

namespace App\Models\Wilayah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $table = 'wil_provinces';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
    ];

    // relasi
    public function regencies(): HasMany
    {
        return $this->hasMany(Regency::class);
    }
}
