<?php

namespace App\Models\Penduduk;

use App\Models\Wilayah\District;
use App\Models\Wilayah\Province;
use App\Models\Wilayah\Regency;
use App\Models\Wilayah\Village;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendudukKeluarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_kk',
        'kepkel_id',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'tgl_cetak',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'kepkel_id' => 'integer',
        'kode_pos' => 'integer',
        'provinsi_id' => 'integer',
        'kota_id' => 'integer',
        'kecamatan_id' => 'integer',
        'kelurahan_id' => 'integer',
        'tgl_cetak' => 'date',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    // relasi
    public function anggotas(): HasMany
    {
        return $this->hasMany(Penduduk::class, 'keluarga_id');
    }

    public function kepkel(): BelongsTo
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function kota(): BelongsTo
    {
        return $this->belongsTo(Regency::class);
    }

    public function kecamatan(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
