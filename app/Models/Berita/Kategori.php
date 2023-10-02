<?php

namespace App\Models\Berita;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'berita_kategoris';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];
}
