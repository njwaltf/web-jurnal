<?php

namespace Database\Seeders;

use App\Models\Absen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Absen::create([
            'date' => '2023-10-15',
            'rombel_id' => 1
        ]);
        Absen::create([
            'date' => '2023-10-15',
            'rombel_id' => 2
        ]);
    }
}