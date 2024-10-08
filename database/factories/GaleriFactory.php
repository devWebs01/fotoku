<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Galeri>
 */
class GaleriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        // Get the image URL
        $imageUrl = 'https://random-image-pepebigotes.vercel.app/api/random-image';

        // Fetch the image contents from the URL
        $imageContents = Http::get($imageUrl)->body();

        // Generate a unique file name for the image
        $imageName = 'gallery_'.Str::random(10).'.jpg';

        // Store the image in the 'public/gallery' directory
        Storage::disk('public')->put('gallery/'.$imageName, $imageContents);

        $fotografer_id = User::whereHas('role', function ($query) {
            $query->where('id', '2');
        })->inRandomOrder()->first();

        return [
            'name' => 'gallery/'.$imageName,  // Save the path to the image in the database
            'judul' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'fotografer_id' => $fotografer_id,
        ];
    }
}
