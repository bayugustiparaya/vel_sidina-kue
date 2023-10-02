<?php

namespace App\Models\Kenagarian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Korong extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'nagari_id',
        'name',
    ];

    // relasi
    public function nagari(): BelongsTo
    {
        return $this->belongsTo(Nagari::class);
    }
}
