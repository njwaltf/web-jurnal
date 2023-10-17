<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Jadwal::create([
            'day' => 'Senin',
            'teacher_id' => 1,
            'rombel_id' => 1,
            'jurusan_id' => 1,
            'mapel_id' => 1,
            'start' => 2,
            'finish' => 4
        ]);
        Jadwal::create([
            'day' => 'Selasa',
            'teacher_id' => 2,
            'jurusan_id' => 1,
            'mapel_id' => 2,
            'rombel_id' => 2,
            'start' => 6,
            'finish' => 8
        ]);
        Jadwal::create([
            'day' => 'Rabu',
            'teacher_id' => 2,
            'jurusan_id' => 1,
            'mapel_id' => 1,
            'rombel_id' => 3,
            'start' => 9,
            'finish' => 10
        ]);
    }
}