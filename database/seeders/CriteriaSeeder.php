<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'johndoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'role' => 'superadmin',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Jane Doe',
            'username' => 'janedoe',
            'email' => 'janedoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'role' => 'SEO',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Jin Doe',
            'username' => 'jindoe',
            'email' => 'jindoe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin1234'),
            'role' => 'pakar',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
