<?php

namespace Database\Seeders;

use App\Models\Wilayah\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        Province::truncate();
        $json = File::get("database/data/provinces.json");
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Province::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
