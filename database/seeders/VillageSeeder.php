<?php

namespace Database\Seeders;

use App\Models\Wilayah\Village;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class VillageSeeder extends Seeder
{
    public function run(): void
    {
        Village::truncate();
        $json = File::get("database/data/villages.json");
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Village::create([
                "id" => $value->id,
                "district_id" => $value->district_id,
                "name" => $value->name
            ]);
        }
    }
}
