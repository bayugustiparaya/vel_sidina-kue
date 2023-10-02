<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawin extends Model
{
    use HasFactory;

    protected $table = 'pdk_kawins';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
