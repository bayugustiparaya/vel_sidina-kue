<?php

namespace App\Models\Penduduk;

use App\Models\Penduduk\Ref\Agama;
use App\Models\Penduduk\Ref\Darah;
use App\Models\Penduduk\Ref\Hubungan;
use App\Models\Penduduk\Ref\Jekel;
use App\Models\Penduduk\Ref\Kawin;
use App\Models\Penduduk\Ref\Pekerjaan;
use App\Models\Penduduk\Ref\Pendidikan;
use App\Models\Penduduk\Ref\Warganegara;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penduduk extends Model
{
    use HasFactory;

    protected $appends = ['age'];

    protected $fillable = [
        'nik',
        'keluarga_id',
        'name',
        'jekel_id',
        'tpt_lahir',
        'tgl_lahir',
        'agama_id',
        'pendidikan_id',
        'pekerjaan_id',
        'darah_id',
        'kawin_id',
        'tgl_perkawinan',
        'hubungan_id',  // kk-level
        'warganegara_id',
        'no_paspor',
        'no_kitap',
        'nama_ayah',
        'nama_ibu',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'keluarga_id' => 'integer',
        'jekel_id' => 'integer',
        'tgl_lahir'  => 'date',
        'agama_id' => 'integer',
        'pendidikan_id' => 'integer',
        'pekerjaan_id' => 'integer',
        'darah_id' => 'integer',
        'kawin_id' => 'integer',
        'tgl_perkawinan' => 'date',
        'hubungan_id' => 'integer',  // kk-level
        'warganegara_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
    ];

    // relasi
    public function documents(): HasMany
    {
        return $this->hasMany(PendudukDokument::class, 'penduduk_id');
    }

    public function keluarga(): BelongsTo
    {
        return $this->belongsTo(PendudukKeluarga::class);
    }

    public function jekel(): BelongsTo
    {
        return $this->belongsTo(Jekel::class);
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class);
    }

    public function pendidikan(): BelongsTo
    {
        return $this->belongsTo(Pendidikan::class);
    }

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function darah(): BelongsTo
    {
        return $this->belongsTo(Darah::class);
    }

    public function kawin(): BelongsTo
    {
        return $this->belongsTo(Kawin::class);
    }

    public function hubungan(): BelongsTo
    {
        return $this->belongsTo(Hubungan::class);
    }

    public function warganegara(): BelongsTo
    {
        return $this->belongsTo(Warganegara::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function age(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->tgl_lahir)->age,
        );
    }

    public function tanggallahir(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->tgl_lahir->translatedFormat('d F Y') ?? '',
        );
    }
}
