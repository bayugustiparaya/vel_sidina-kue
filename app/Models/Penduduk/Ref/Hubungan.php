<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hubungan extends Model
{
    use HasFactory;

    protected $table = 'pdk_hubungans';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
