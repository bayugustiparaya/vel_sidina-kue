<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Etnis;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EtnisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etnis::truncate();
        $json = File::get('database/data/pdk_etnis.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Etnis::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
