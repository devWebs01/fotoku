<?php

namespace Database\Seeders;

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
        DB::table('kecamatan')->insert(
            [
                ['id' => 1, 'nama_kecamatan' => 'Alam Barajo', 'keterangan' => 'Bagan Pete, Beliung, Kenali Besar, Mayang, Mangurai, Rawa Sari', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 2, 'nama_kecamatan' => 'Danau Sipin', 'keterangan' => 'Legok, Murni, Selamat, Solok Sipin, Sungai Putri', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 3, 'nama_kecamatan' => 'Danau Teluk', 'keterangan' => 'Olak, Kemang, Pasir Panjang, Tanjung Pasir, Tanjung Raden, Ulu Gedong', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 4, 'nama_kecamatan' => 'Jambi Selatan', 'keterangan' => 'Pakuan Baru, Pasir Putih, Tambak Sari, The Hok, Wijaya Pura', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 5, 'nama_kecamatan' => 'Jambi Timur', 'keterangan' => 'Budiman, Kasang, Kasang Jaya, Rajawali, Sejinjang, Sulanjana, Talang Banjar, Tanjung Pinang, Tanjung Sari', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 6, 'nama_kecamatan' => 'Jelutung', 'keterangan' => 'Cempaka Putih, Handil Jaya, Jelutung, Kebun Handil, Lebak Bandung, Payo Lebar, Talang Jauh', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 7, 'nama_kecamatan' => 'Kota Baru', 'keterangan' => 'Kenali Asam Atas, Kenali Asam Bawah, Paal Lima, Simpang Tiga, Sipin, Sukakarya', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 8, 'nama_kecamatan' => 'Paal Merah', 'keterangan' => 'Eka Jaya, Lingkar Selatan, Paal Merah, Payo Selincah, Talang Bakung', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 9, 'nama_kecamatan' => 'Pasar Jambi', 'keterangan' => 'Beringin, Orang Kayo Hitam, Pasar Jambi, Sungai Asam', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 10, 'nama_kecamatan' => 'Pelayangan', 'keterangan' => 'Arab Melayu, Jelmu, Mudung Laut, Tahtul Yaman, Tanjung Johor, Tengah', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
                ['id' => 11, 'nama_kecamatan' => 'Telanaipura', 'keterangan' => 'Buluran, Kenali, Pematang, Sulur, Penyengat Rendah, Simpang Empat Sipin, Telanaipura, Teluk Kenali', 'created_at' => '2023-06-02 01:10:22', 'updated_at' => '2023-06-02 01:10:22'],
            ]
        );
    }
}
