<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Warganegara;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class WarganegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warganegara::truncate();
        $json = File::get('database/data/pdk_warganegara.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Warganegara::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
