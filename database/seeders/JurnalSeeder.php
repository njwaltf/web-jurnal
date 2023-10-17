<?php

namespace Database\Seeders;

use App\Models\Jurnal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurnalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        Jurnal::create([
            'date' => '2023-10-15',
            'jadwal_id' => 1,
            'rombel_id' => 1,
            'kd' => 'KD 1',
            'material' => 'Perkalian',
            'task' => 'Bikin nuklir',
            'sakit' => 1,
            'izin' => 2,
            'hadir' => 33,
            'detail' => 'Mamat meninggal jadi izin'
        ]);
        Jurnal::create([
            'date' => '2023-10-16',
            'jadwal_id' => 1,
            'rombel_id' => 1,
            'kd' => 'KD 2',
            'material' => 'asal usul manusia',
            'task' => 'Bikin nuklir',
            'sakit' => 1,
            'izin' => 2,
            'hadir' => 33,
            'detail' => 'Mamat meninggal jadi izin'
        ]);
    }
}