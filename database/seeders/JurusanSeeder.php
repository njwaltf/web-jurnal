<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Jurusan::create([
            'name' => 'Rekayasa Perangkat Lunak',
        ]);
        Jurusan::create([
            'name' => 'Multimedia',
        ]);
        Jurusan::create([
            'name' => 'Bisnis Daring Pemasaran',
        ]);
        Jurusan::create([
            'name' => 'Otomatisasi Perkantoran',
        ]);
        Jurusan::create([
            'name' => 'Akuntansi',
        ]);
        Jurusan::create([
            'name' => 'Umum',
        ]);
    }
}