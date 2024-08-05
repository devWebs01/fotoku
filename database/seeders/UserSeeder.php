<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama' => 'admin',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => bcrypt('admin'),
        ]);

        $fotografer = User::create([
            'nama' => 'fotografer',
            'email' => 'fotografer@fotografer.com',
            'role_id' => 2,
            'spesialisasi' => 'Photography Wedding',
            'password' => bcrypt('fotografer'),
        ]);

        $pelanggan = User::create([
            'nama' => 'pelanggan',
            'email' => 'pelanggan@pelanggan.com',
            'role_id' => 3,
            'password' => bcrypt('pelanggan'),
        ]);
    }
}
