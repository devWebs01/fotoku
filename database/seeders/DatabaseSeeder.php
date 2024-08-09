<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\User;
use App\Models\Galeri;
use App\Models\Jadwal;
use App\Models\Produk;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            SettingSeeder::class,
            KecamatanSeeder::class,
            UserSeeder::class,
        ]);

           // Menambahkan data untuk User
          User::factory()->count(5)->create();
          $this->command->info('Users have been seeded.');

          // Menambahkan data untuk Bank
          Bank::factory()->count(5)->create();
          $this->command->info('Bank have been seeded.');

          // Menambahkan data untuk Galeri
          Galeri::factory()->count(30)->create();
          $this->command->info('Gallery have been seeded.');

          // Menambahkan data untuk Produk
          Produk::factory()->count(20)->create();
          $this->command->info('Product have been seeded.');

          // Menambahkan data untuk Jadwal
          Jadwal::factory()->count(10)->create();
          $this->command->info('Jadwal have been seeded.');

          // Menambahkan data untuk Booking
          Booking::factory()->count(10)->create();
          $this->command->info('Booking have been seeded.');
    }
}
