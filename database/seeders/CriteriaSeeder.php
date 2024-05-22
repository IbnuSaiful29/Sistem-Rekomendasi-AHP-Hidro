<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criteria = [
            ['nama_kriteria' => 'Suhu', 'type' => 'Benefit'],
            ['nama_kriteria' => 'Hidrologi' , 'type' => 'Cost'],
            ['nama_kriteria' => 'Infrastruktur' , 'type' => 'Cost'],
            ['nama_kriteria' => 'Kelembapan', 'type' => 'Benefit'],
        ];

        // Insert data ke tabel criteria
        foreach ($criteria as $index) {
            DB::table('kriteria')->insert([
                'nama_kriteria' => $index['nama_kriteria'],
                'type' => $index['type'],
            ]);
        }
    }
}
