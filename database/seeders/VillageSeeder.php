<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Village;
use Carbon\Carbon;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villages = [
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Bulak', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Bunihayu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Jatibarang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Jatibarang Baru', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Kalensari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Liwung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Loyang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Pawidean', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Pilangsari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Puntang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Sukalila', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Tegalurung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Jatisawit', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Jatibarang', 'nama_desa' => 'Jatisawit Lor', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Bojongslawi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Penganjang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Panyindangan Kulon', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Panyindangan Wetan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Sindang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Sindangkerta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Wanantara', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Kelurahan Karanganyar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Sindang', 'nama_desa' => 'Kelurahan Lemahabang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Arahan', 'nama_desa' => 'Arahan Kidul', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Arahan', 'nama_desa' => 'Arahan Lor', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Arahan', 'nama_desa' => 'Cangkingan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Arahan', 'nama_desa' => 'Sukadana', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Balongan', 'nama_desa' => 'Balongan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Balongan', 'nama_desa' => 'Gunungsari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Balongan', 'nama_desa' => 'Majakerta', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Balongan', 'nama_desa' => 'Rawadalem', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Balongan', 'nama_desa' => 'Sukareja', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Bangodua', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Bunder', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Loyang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Rancasari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Sindangjawa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bangodua', 'nama_desa' => 'Wanasari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Bongas', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Cidempet', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Kertasemaya', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Loyang', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Rancasari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Sindangjawa', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nama_kabupaten' => 'Indramayu', 'nama_kecamatan' => 'Bongas', 'nama_desa' => 'Wanasari', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        foreach ($villages as $village) {
            Village::create($village);
        }
    }
}
