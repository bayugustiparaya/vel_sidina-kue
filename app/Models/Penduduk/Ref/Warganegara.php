<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warganegara extends Model
{
    use HasFactory;

    protected $table = 'pdk_warganegaras';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
