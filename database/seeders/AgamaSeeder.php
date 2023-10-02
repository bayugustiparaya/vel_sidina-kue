<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Agama;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class AgamaSeeder extends Seeder
{
    public function run(): void
    {
        Agama::truncate();
        $json = File::get('database/data/pdk_agama.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Agama::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
