<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Teacher::create([
            'name' => 'Asep',
            'nip' => '5326972345',
            'mapel_id' => 1,
        ]);
        Teacher::create([
            'name' => 'Agus',
            'nip' => '5326972346',
            'mapel_id' => 2,
        ]);
    }
}