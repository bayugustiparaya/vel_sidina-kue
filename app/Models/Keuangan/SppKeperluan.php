<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SppKeperluan extends Model
{
    use HasFactory;
    protected $table = 'spp_keperluan';
    public $timestamps = true;
    protected $fillable = [
        'keperluan',
        'jumlah_pengambilan',
    ];
    public function spp(): BelongsTo
    {
        return $this->BelongsTo(Spp::class,'spp_id');
    }
}
