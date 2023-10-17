<?php

namespace Database\Seeders;

use App\Models\Mapel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Mapel::create([
            'mapel_name' => 'Bahasa Inggris',
            'jurusan_id' => 6
        ]);
        Mapel::create([
            'mapel_name' => 'PKN',
            'jurusan_id' => 6
        ]);
        Mapel::create([
            'mapel_name' => 'Pemromgraman Berorientasi Objek',
            'jurusan_id' => 1
        ]);
    }
}