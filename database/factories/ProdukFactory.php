<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Get the image URL
        $imageUrl1 = 'https://random.imagecdn.app/500/500';
        $imageUrl2 = 'https://random.imagecdn.app/500/500';

        // Fetch the image contents from the URL
        $imageContents1 = Http::get($imageUrl1)->body();
        $imageContents2 = Http::get($imageUrl2)->body();

        // Generate a unique file name for the image
        $imageName1 = 'product_'.Str::random(10).'.jpg';
        $imageName2 = 'product_'.Str::random(10).'.jpg';

        // Store the image in the 'public/product' directory
        Storage::disk('public')->put('product/'.$imageName1, $imageContents1);
        Storage::disk('public')->put('product/'.$imageName2, $imageContents2);

        // Ambil pengguna dengan role "Pelanggan"
        $fotografer_id = User::whereHas('role', function ($query) {
            $query->where('id', '2');
        })->inRandomOrder()->first();

        return [
            'fotografer_id' => $fotografer_id,
            'nama_produk' => $this->faker->word(),
            'harga' => $this->faker->randomFloat(0, 500000, 1000000),
            'info' => $this->faker->paragraph(),
            'gambar_1' => 'product/'.$imageName1,
            'gambar_2' => 'product/'.$imageName2,
        ];
    }
}
