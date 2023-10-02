<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Pekerjaan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PekerjaanSeeder extends Seeder
{
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        Pekerjaan::truncate();
        $json = File::get('database/data/pdk_pekerjaan.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Pekerjaan::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
        // Schema::enableForeignKeyConstraints();
    }
}
