<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Kawin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class KawinSeeder extends Seeder
{
    public function run(): void
    {
        Kawin::truncate();
        $json = File::get('database/data/pdk_kawin.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Kawin::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
