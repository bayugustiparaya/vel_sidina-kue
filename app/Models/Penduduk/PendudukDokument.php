<?php

namespace App\Models\Penduduk;

use App\Models\Surat\SuratSyarat;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendudukDokument extends Model
{
    use HasFactory;

    protected $fillable = [
        'penduduk_id',
        'name',
        'filename',
        'subdir',
        'surat_srayat_id',
    ];

    protected $casts = [
        'penduduk_id' => 'integer',
        'filename' => 'text',
        'surat_srayat_id' => 'integer',
    ];

    // relasi
    public function penduduk(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function suratSyarat(): BelongsTo
    {
        return $this->belongsTo(SuratSyarat::class);
    }
}
