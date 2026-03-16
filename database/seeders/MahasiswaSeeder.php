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
            'mata_kuliah' => json_encode([
                [
                    'kode' => 'COM60015',
                    'nama' => 'Matematika Diskrit',
                    'sks' => 2
                ],
                [
                    'kode' => 'COM60025',
                    'nama' => 'Kalkulus',
                    'sks' => 2
                ]
            ])
        ]);
        Mahasiswa::create([
            'nim' => '098765432109876',
            'nama' => 'Adit',
            'mata_kuliah' => json_encode([
                [
                    'kode' => 'COM60035',
                    'nama' => 'Arsitektur dan Organisasi Komputer',
                    'sks' => 3
                ],
                [
                    'kode' => 'Pengantar Keilmuan Komputer',
                    'nama' => 'Biologi',
                    'sks' => 4
                ]
            ])
        ]);
    }
}
