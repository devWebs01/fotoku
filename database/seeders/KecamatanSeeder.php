<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kecamatan')->insert([
            ['id' => 1, 'nama_kecamatan' => 'Alam Barajo', 'keterangan' => null, 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
            ['id' => 2, 'nama_kecamatan' => 'Danau Sipin', 'keterangan' => null, 'created_at' => '2023-06-02 01:10:54', 'updated_at' => '2023-06-02 01:10:54'],
            ['id' => 3, 'nama_kecamatan' => 'Jambi Selatan', 'keterangan' => null, 'created_at' => '2023-06-02 01:11:29', 'updated_at' => '2023-06-02 01:11:29'],
            ['id' => 4, 'nama_kecamatan' => 'Jambi Timur', 'keterangan' => null, 'created_at' => '2023-06-02 01:11:50', 'updated_at' => '2023-06-02 01:11:50'],
            ['id' => 5, 'nama_kecamatan' => 'Kota Baru', 'keterangan' => null, 'created_at' => '2023-06-02 01:12:12', 'updated_at' => '2023-06-02 01:12:12'],
            ['id' => 6, 'nama_kecamatan' => 'Pelayangan', 'keterangan' => null, 'created_at' => '2023-06-02 01:12:31', 'updated_at' => '2023-06-02 01:12:31'],
            ['id' => 7, 'nama_kecamatan' => 'Telanaipura', 'keterangan' => null, 'created_at' => '2023-06-02 01:13:01', 'updated_at' => '2023-06-02 01:13:01'],
            ['id' => 8, 'nama_kecamatan' => 'Sungai Gelam', 'keterangan' => null, 'created_at' => '2023-06-02 01:13:30', 'updated_at' => '2023-06-02 01:13:30'],
            ['id' => 9, 'nama_kecamatan' => 'Jambi Luar Kota', 'keterangan' => null, 'created_at' => '2023-06-02 01:13:51', 'updated_at' => '2023-06-02 01:13:51'],
            ['id' => 10, 'nama_kecamatan' => 'Jambi Tengah', 'keterangan' => null, 'created_at' => '2023-06-02 01:14:20', 'updated_at' => '2023-06-02 01:14:20'],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}
