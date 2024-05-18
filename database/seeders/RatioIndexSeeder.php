<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RatioIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratioIndices = [
            ['matrix' => 1, 'nilai_ratio' => 0.00],
            ['matrix' => 2, 'nilai_ratio' => 0.00],
            ['matrix' => 3, 'nilai_ratio' => 0.58],
            ['matrix' => 4, 'nilai_ratio' => 0.90],
            ['matrix' => 5, 'nilai_ratio' => 1.12],
            ['matrix' => 6, 'nilai_ratio' => 1.24],
            ['matrix' => 7, 'nilai_ratio' => 1.32],
            ['matrix' => 8, 'nilai_ratio' => 1.41],
            ['matrix' => 9, 'nilai_ratio' => 1.45],
            ['matrix' => 10, 'nilai_ratio' => 1.49],
            ['matrix' => 11, 'nilai_ratio' => 1.51],
            ['matrix' => 12, 'nilai_ratio' => 1.48],
            ['matrix' => 13, 'nilai_ratio' => 1.56],
            ['matrix' => 14, 'nilai_ratio' => 1.57],
            ['matrix' => 15, 'nilai_ratio' => 1.59],
        ];

        foreach ($ratioIndices as $index) {
            DB::table('ratio_index')->insert([
                'matrix' => $index['matrix'],
                'nilai-ratio' => $index['nilai_ratio'],
            ]);
        }
    }
}
