<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $imageUrl = "https://api.api-ninjas.com/v1/randomimage?category=nature";

        // Fetch the image contents from the URL
        $imageContents = Http::get($imageUrl)->body();

        // Generate a unique file name for the image
        $imageName = 'gallery_' . Str::random(10) . '.jpg';

        // Store the image in the 'public/gallery' directory
        Storage::disk('public')->put('gallery/' . $imageName, $imageContents);

        return [
            'name' => 'gallery/' . $imageName,  // Save the path to the image in the database
            'judul' => $this->faker->sentence(),
            'deskripsi' => $this->faker->paragraph(),
            'fotografer_id' => User::factory(),
        ];
    }
}
