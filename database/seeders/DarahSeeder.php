<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Darah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DarahSeeder extends Seeder
{
    public function run(): void
    {
        Darah::truncate();
        $json = File::get('database/data/pdk_darah.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Darah::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
