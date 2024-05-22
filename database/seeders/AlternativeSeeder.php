<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternativeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = [
            ['nama_alternatif' => 'ALternatif 1'],
            ['nama_alternatif' => 'Alternatif 2'],
            ['nama_alternatif' => 'ALternatif 3'],
            ['nama_alternatif' => 'Alternatif 4'],
        ];

        // Insert data ke tabel criteria
        DB::table('alternatif')->insert($alternatif);
    }
}
