<?php

namespace App\Models\Surat;

use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SuratJenis extends Model
{
    use HasFactory;

    protected $appends = ['format_surat'];

    protected $fillable = [
        'name',
        'nf_singkatan',
        'nf_wilayah',
        'nf_romawi',
        'master_template',
        'custom_template',
        'form_isian',
        'kode_isian',
        'syarat',
        'is_active',
        'is_available',
        'ikon',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'form_isian' => 'array',
        'kode_isian' => 'array',
        'is_active' => 'boolean',
        'is_available' => 'boolean',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    // relasi
    public function suratSyarats(): BelongsToMany
    {
        return $this->belongsToMany(SuratSyarat::class, 'surat_has_syarat');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    // add atribute, remember to appends
    public function formatSurat(): Attribute
    {
        return Attribute::make(
            get: fn () => 'Nomor /' . $this->nf_singkatan . '/' . $this->nf_wilayah . '/' . $this->nf_romawi . '/ Tahun',
        );
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = auth('admin')->user()->id;
            $model->updated_by = auth('admin')->user()->id;
        });

        static::updating(function ($model) {
            $model->updated_by = auth('admin')->user()->id;
        });
    }
}
