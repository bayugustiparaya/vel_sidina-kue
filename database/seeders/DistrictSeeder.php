<?php

namespace Database\Seeders;

use App\Models\Wilayah\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        District::truncate();
        $json = File::get("database/data/districts.json");
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            District::create([
                "id" => $value->id,
                "regency_id" => $value->regency_id,
                "name" => $value->name
            ]);
        }
    }
}
