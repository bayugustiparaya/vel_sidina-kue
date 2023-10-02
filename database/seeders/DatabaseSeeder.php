<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call([
            ProvinceSeeder::class,
            RegencySeeder::class,
            DistrictSeeder::class,
            VillageSeeder::class,
            UserSeeder::class,
            JabatanSeeder::class,
            AgamaSeeder::class,
            DarahSeeder::class,
            HubunganSeeder::class,
            JekelSeeder::class,
            KawinSeeder::class,
            PekerjaanSeeder::class,
            PendidikanSeeder::class,
            WarganegaraSeeder::class,
            EtnisSeeder::class,
            SyaratsuratSeeder::class,
            BeritaKategoriSeeder::class,
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
