<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Mng User
        'App\Models\Penduduk\PendudukAkun' => 'App\Policies\Penduduk\PendudukAkunPolicy',

        // Mng Berita
        'App\Models\Berita\Berita' => 'App\Policies\Berita\BeritaPolicy',
        'App\Models\Berita\Kategori' => 'App\Policies\Berita\KategoriPolicy',

        // Mng Kenagarian
        'App\Models\Kenagarian\Nagari' => 'App\Policies\Kenagarian\NagariPolicy',

        // Mng Referensi
        'App\Models\Penduduk\Ref\Agama' => 'App\Policies\Penduduk\Ref\AgamaPolicy',
        'App\Models\Penduduk\Ref\Darah' => 'App\Policies\Penduduk\Ref\DarahPolicy',
        'App\Models\Penduduk\Ref\Etnis' => 'App\Policies\Penduduk\Ref\EtnisPolicy',
        'App\Models\Penduduk\Ref\Hubungan' => 'App\Policies\Penduduk\Ref\HubunganPolicy',
        'App\Models\Penduduk\Ref\Jekel' => 'App\Policies\Penduduk\Ref\JekelPolicy',
        'App\Models\Penduduk\Ref\Kawin' => 'App\Policies\Penduduk\Ref\KawinPolicy',
        'App\Models\Penduduk\Ref\Pekerjaan' => 'App\Policies\Penduduk\Ref\PekerjaanPolicy',
        'App\Models\Penduduk\Ref\Pendidikan' => 'App\Policies\Penduduk\Ref\PendidikanPolicy',
        'App\Models\Penduduk\Ref\Warganegara' => 'App\Policies\Penduduk\Ref\WarganegaraPolicy',

        // Mng Wilayah
        'App\Models\Wilayah\Province' => 'App\Policies\Wilayah\ProvincePolicy',
        'App\Models\Wilayah\Regency' => 'App\Policies\Wilayah\RegencyPolicy',
        'App\Models\Wilayah\District' => 'App\Policies\Wilayah\DistrictPolicy',
        'App\Models\Wilayah\Village' => 'App\Policies\Wilayah\VillagePolicy',

        // Mng Penduduk
        'App\Models\Penduduk\PendudukKeluarga' => 'App\Policies\Penduduk\PendudukKeluargaPolicy',
        'App\Models\Penduduk\Penduduk' => 'App\Policies\Penduduk\PendudukPolicy',

        // Mng Surat
        'App\Models\Surat\SuratJenis' => 'App\Policies\Surat\SuratJenisPolicy',
        'App\Models\Surat\SuratSyarat' => 'App\Policies\Surat\SuratSyaratPolicy',

        // Mng Permohonan
        'App\Models\Surat\SuratPermohonan' => 'App\Policies\Permohonan\SuratMasukPolicy',
        'App\Models\Surat\SuratPermohonan' => 'App\Policies\Permohonan\MenungguTtdPolicy',
        'App\Models\Surat\SuratPermohonan' => 'App\Policies\Permohonan\SiapDidownloadPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
