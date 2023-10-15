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
            'name' => 'Bahasa Inggris'
        ]);
        Mapel::create([
            'name' => 'PKN'
        ]);
        Mapel::create([
            'name' => 'Pemromgraman Berorientasi Objek'
        ]);
    }
}