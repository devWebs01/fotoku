<?php

namespace Database\Factories;

use App\Models\Jadwal;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Ambil pengguna dengan role "Pelanggan"
        $pelanggan = User::whereHas('role', function ($query) {
            $query->where('id', '3');
        })->inRandomOrder()->first();

        // Get the image URL
        $imageUrl = 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjBXnTFqQ-e-GMLstFovlJKGH7s3UOSM3GwqN7sPbM8x4atv6aIP3mE5MeMhUlQ7PruJtOL8ZhXg9iKlzqmxc60nUrFmY7J6zQ8rYoi9hcLzswzWXQpRFNtj3aYBlpk7_0tr06W8trFrsTR/s640-rw/hadits21info-invoice%25231797799.jpg';

        // Fetch the image contents from the URL
        $imageContents = Http::get($imageUrl)->body();

        // Generate a unique file name for the image
        $imageName = 'bukti_bayar_'.Str::random(10).'.jpg';

        // Store the image in the 'public/bukti_bayar' directory
        Storage::disk('public')->put('bukti_bayar/'.$imageName, $imageContents);

        return [
            'pelanggan_id' => $pelanggan ? $pelanggan->id : null,
            'produk_id' => Produk::inRandomOrder()->first()->id,
            'jadwal_id' => Jadwal::inRandomOrder()->first()->id,
            'total_bayar' => $this->faker->numberBetween(500000, 1000000), // Pastikan tipe data sesuai (misal: integer)
            'total_booking' => $this->faker->numberBetween(500000, 1000000), // Pastikan tipe data sesuai (misal: integer)
            'bukti_booking' => 'bukti_bayar/'.$imageName,
            'bukti_bayar' => 'bukti_bayar/'.$imageName,
            'status_booking' => $this->faker->randomElement(['Booking', 'Cancel', 'DP', 'Lunas', 'Selesai']),
        ];
    }
}
