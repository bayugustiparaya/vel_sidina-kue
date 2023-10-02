<?php

namespace Database\Seeders;

use App\Models\Wilayah\Regency;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class RegencySeeder extends Seeder
{
    public function run(): void
    {
        Regency::truncate();
        $json = File::get("database/data/regencies.json");
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Regency::create([
                "id" => $value->id,
                "province_id" => $value->province_id,
                "name" => $value->name
            ]);
        }
    }
}
