<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Jekel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JekelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jekel::truncate();
        $json = File::get('database/data/pdk_jekel.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Jekel::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
