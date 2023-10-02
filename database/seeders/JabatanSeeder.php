<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get('database/data/jabatan.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Jabatan::create([
                "name" => $value->name,
                "guard_name" => $value->guard_name
            ]);
        }
    }
}
