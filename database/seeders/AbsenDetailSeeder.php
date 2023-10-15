<?php

namespace Database\Seeders;

use App\Models\AbsenDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsenDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        AbsenDetail::create([
            'student_id' => 1,
            'date_detail' => '2023-10-15',
            'attendance' => 'Hadir',
            'rombel_id' => 1
        ]);
        AbsenDetail::create([
            'student_id' => 2,
            'date_detail' => '2023-10-15',
            'attendance' => 'Izin',
            'detail' => 'Lomba',
            'rombel_id' => 1

        ]);
        AbsenDetail::create([
            'student_id' => 3,
            'date_detail' => '2023-10-15',
            'attendance' => 'Sakit',
            'detail' => 'Sakit ginjal',
            'rombel_id' => 2
        ]);
        AbsenDetail::create([
            'student_id' => 4,
            'date_detail' => '2023-10-15',
            'attendance' => 'Alpha',
            'rombel_id' => 2
        ]);
    }
}