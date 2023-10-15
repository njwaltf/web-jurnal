<?php

namespace Database\Seeders;

use App\Models\Rombel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RombelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Rombel::create([
            'name' => 'X RPL'
        ]);
        Rombel::create([
            'name' => 'XI RPL'
        ]);
        Rombel::create([
            'name' => 'XII RPL'
        ]);
    }
}