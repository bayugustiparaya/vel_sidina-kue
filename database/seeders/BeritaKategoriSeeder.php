<?php

namespace Database\Seeders;

use App\Models\Berita\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class BeritaKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Kategori::truncate();
        $json = File::get('database/data/berita_kategori.json');
        $datas = json_decode($json);
        foreach ($datas as $key => $value) {
            Kategori::create([
                "id" => $value->id,
                "name" => $value->name,
                "slug" => $value->slug,
            ]);
        }
    }
}
