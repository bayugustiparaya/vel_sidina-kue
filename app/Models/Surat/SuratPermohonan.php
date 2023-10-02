<?php

namespace App\Models\Surat;

use App\Models\Penduduk\Penduduk;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPermohonan extends Model
{
    use HasFactory;

    const CREATED_AT = 'permohonan_at';

    protected $appends = ['tglpengajuan'];

    protected $fillable = [
        'surat_jenis_id',
        'nomor_surat', // nf_singkatan+angkaacak
        'pemohon_id',
        'isian_form',
        'status',
        'alasan',
        'alasan_ditolak',
        'keterangan',
        'hp_aktif',
        'syarat',
        'is_ttd',
        'file',
        'checked_at',
        'finished_at',
        'download_at',
        'rejected_at',
        'checked_by',
        'approved_by',
        'rejected_by',
    ];

    protected $casts = [
        'surat_jenis_id' => 'integer',
        'pemohon_id' => 'integer',
        'isian_form' => 'array',
        'syarat' => 'array',
        'is_ttd' => 'boolean',
        'checked_at' => 'datetime',
        'finished_at' => 'datetime',
        'download_at' => 'datetime',
        'rejected_at' => 'datetime',
        'checked_by' => 'integer',
        'approved_by' => 'integer',
        'rejected_by' => 'integer',
    ];

    // relasi
    public function suratJenis(): BelongsTo
    {
        return $this->belongsTo(SuratJenis::class);
    }

    public function pemohon(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function checkedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function approvedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function rejectedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    public function tglpengajuan(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->permohonan_at->translatedFormat('d F Y'),
        );
    }

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->tgl_dibaca = $model->freshTimestamp();
    //     });
    // }
}
