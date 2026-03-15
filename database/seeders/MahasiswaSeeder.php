<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '123456789012345',
            'nama' => 'Didi',
        ]);
        Mahasiswa::create([
            'nim' => '098765432109876',
            'nama' => 'Adit',
        ]);
    }
}
