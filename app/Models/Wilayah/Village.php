<?php

namespace App\Models\Wilayah;

use App\Models\Kenagarian\Nagari;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Village extends Model
{
    use HasFactory;

    protected $table = 'wil_villages';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'district_id',
        'name',
    ];

    // relasi
    public function nagari(): HasOne
    {
        return $this->hasOne(Nagari::class, 'kelurahan_id');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
