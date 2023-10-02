<?php

namespace App\Models\Kenagarian;

use App\Models\User;
use App\Models\Wilayah\District;
use App\Models\Wilayah\Province;
use App\Models\Wilayah\Regency;
use App\Models\Wilayah\Village;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nagari extends Model
{
    use HasFactory;

    protected $appends = ['kode_wilayah'];

    protected $fillable = [
        'provinsi_id',
        'kota_id',
        'kecamatan_id',
        'kelurahan_id',
        'name',
        'alamat_kantor',
        'kode_pos',
        'telepon',
        'email',
        'website',
        'is_active',
        'visi',
        'misi',
        'batas_utara',
        'batas_selatan',
        'batas_barat',
        'batas_timur',
        'komoditas_unggulan_luas_tanam',
        'komoditas_unggulan_nilai_ekonomi',
        'luas_sawah',
        'luas_tanah_kering',
        'luas_tanah_basah',
        'luas_perkebunan',
        'luas_fasilitas_umum',
        'luas_hutan',
        'jarak_ke_provinsi',
        'jarak_ke_kabupaten',
        'jarak_ke_kecamatan',
        'logo',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'luas_sawah' => 'decimal:3',
        'luas_tanah_kering' => 'decimal:3',
        'luas_tanah_basah' => 'decimal:3',
        'luas_perkebunan' => 'decimal:3',
        'luas_fasilitas_umum' => 'decimal:3',
        'luas_hutan' => 'decimal:3',
        'jarak_ke_provinsi' => 'decimal:3',
        'jarak_ke_kabupaten' => 'decimal:3',
        'jarak_ke_kecamatan' => 'decimal:3',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    // relasi
    public function korongs(): HasMany
    {
        return $this->hasMany(Korong::class);
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

    // add atribute, remember to appends
    public function kodeWilayah(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->kelurahan->id,
        );
    }

    // listener
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
