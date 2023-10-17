<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\AbsenDetailSeeder;
use Database\Seeders\AbsenSeeder;
use Database\Seeders\JadwalSeeder;
use Database\Seeders\MapelSeeder;
use Database\Seeders\RombelSeeder;
use Database\Seeders\StudentSeeder;
use Database\Seeders\TeacherSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run() : void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'username' => 'x_rpl',
            'rombel_id' => 1,
            'role' => 'PJ',
            'jurusan_id' => 1,
            'password' => 'XRPL'
        ]);

        User::create([
            'username' => 'admin_jurnal',
            'role' => 'Admin',
            'password' => 'admin_jurnal'
        ]);

        $this->call(RombelSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(JadwalSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(AbsenSeeder::class);
        $this->call(AbsenDetailSeeder::class);
        $this->call(JurnalSeeder::class);
        $this->call(JurusanSeeder::class);
    }
}