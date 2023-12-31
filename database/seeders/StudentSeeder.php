<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Student::create([
            'nis' => '20210811',
            'full_name' => 'ADELIA HARNI',
            'tahun_ajaran' => '2022/2023',
            'rombel_id' => 1,
            'jurusan_id' => 1
        ]);
        Student::create([
            'nis' => '20210812',
            'tahun_ajaran' => '2022/2023',
            'full_name' => 'ADELA DWI KIRANA',
            'rombel_id' => 1,
            'jurusan_id' => 1
        ]);

        Student::create([
            'nis' => '20220899',
            'tahun_ajaran' => '2022/2023',
            'full_name' => 'NADYA ARLA',
            'rombel_id' => 2,
            'jurusan_id' => 1
        ]);
        Student::create([
            'nis' => '20220890',
            'tahun_ajaran' => '2022/2023',
            'full_name' => 'AFTIKA NADYA ARLA',
            'rombel_id' => 2,
            'jurusan_id' => 1
        ]);
    }
}