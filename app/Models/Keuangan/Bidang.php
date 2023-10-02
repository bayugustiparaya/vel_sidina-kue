<?php

namespace App\Models\Keuangan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'bidang';
    protected $fillable = [
        'name',
    ];
    public $timestamps = true;

    public function sub_bidang() : hasMany 
    {
        return $this->hasMany(SubBidang::class);
    }

    public function pagu_anggaran() : hasMany 
    {
        return $this->hasMany(PaguAnggaran::class,'bidang_id');
    }

    public function spp() : hasMany 
    {
        return $this->hasMany(Spp::class,'spp_id');
    }
    
    public function sumber_anggaran() : hasMany 
    {
        return $this->hasMany(SumberAnggaran::class,'sumber_anggaran_id');
    }
}