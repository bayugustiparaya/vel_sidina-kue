<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $table = 'pdk_agamas';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
