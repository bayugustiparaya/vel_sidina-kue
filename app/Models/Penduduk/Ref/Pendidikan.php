<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pdk_pendidikans';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
