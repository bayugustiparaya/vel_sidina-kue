<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Hubungan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class HubunganSeeder extends Seeder
{
    public function run(): void
    {
        Hubungan::truncate();
        $json = File::get('database/data/pdk_hubungan.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Hubungan::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
