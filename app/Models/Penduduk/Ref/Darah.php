<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Darah extends Model
{
    use HasFactory;

    protected $table = 'pdk_darahs';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
