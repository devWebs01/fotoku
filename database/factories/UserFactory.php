<?php

namespace Database\Factories;

use App\Models\Kecamatan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generate a random number between 1 and 70 for the image
        $randomImageNumber = rand(1, 70);

        // Get the image URL
        $imageUrl = "https://i.pravatar.cc/300?img={$randomImageNumber}";

        // Fetch the image contents from the URL
        $imageContents = Http::get($imageUrl)->body();

        // Generate a unique file name for the image
        $imageName = 'profile_'.Str::random(10).'.jpg';

        // Store the image in the 'public/profile' directory
        Storage::disk('public')->put('profile/'.$imageName, $imageContents);

        return [
            'kecamatan_id' => Kecamatan::inRandomOrder()->first()->id,
            'role_id' => 2,
            'nama' => $this->faker->name(),
            'spesialisasi' => $this->faker->randomElement([
                'Photography Wedding',
                'Photography Birthday',
                'Photography Food',
                'Photography Fashion',
                'Photography Street',
                'Photography Outdoor',
            ]),
            'no_telp' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // or Hash::make('password')
            'status' => $this->faker->randomElement(['Aktif', 'Non Aktif']),
            'tgl_lahir' => $this->faker->date(),
            'foto_profile' => 'profile/'.$imageName,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
