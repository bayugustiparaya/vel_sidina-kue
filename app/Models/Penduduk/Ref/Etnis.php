<?php

namespace App\Models\Penduduk\Ref;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnis extends Model
{
    use HasFactory;

    protected $table = 'pdk_etnis';

    public $timestamps = false;

    protected $fillable = [
        'name'
    ];
}
