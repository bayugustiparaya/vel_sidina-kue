<?php

namespace Database\Seeders;

use App\Models\Surat\SuratSyarat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SyaratsuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SuratSyarat::truncate();
        $json = File::get('database/data/syarat_surat.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            SuratSyarat::create([
                "id" => $value->id,
                "name" => $value->name
            ]);
        }
    }
}
