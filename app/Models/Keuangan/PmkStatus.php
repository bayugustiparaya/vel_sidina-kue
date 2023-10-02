<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PmkStatus extends Model
{
    use HasFactory;
    protected $table = 'pmk_status';
    public $timestamps = true;
    protected $fillable = [
        'status',
    ];

    public function Spp(): HasMany
    {
        return $this->hasMany(Spp::class,'spp_id');
    }
}
