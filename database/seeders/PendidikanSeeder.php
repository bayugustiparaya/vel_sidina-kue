<?php

namespace Database\Seeders;

use App\Models\Penduduk\Ref\Pendidikan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class PendidikanSeeder extends Seeder
{
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        Pendidikan::truncate();
        $json = File::get('database/data/pdk_pendidikan.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Pendidikan::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
        // Schema::enableForeignKeyConstraints();
    }
}
