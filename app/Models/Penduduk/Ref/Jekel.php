<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jekel extends Model
{
    use HasFactory;

    protected $table = 'pdk_jekels';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
