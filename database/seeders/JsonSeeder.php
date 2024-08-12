<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Exception;


class JsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Path to the JSON file
        $path = public_path('users.json');

        // Check if the file exists
        if (!File::exists($path)) {
            Log::error("File not found: $path");
            return;
        }

        // Read the JSON file
        $json = File::get($path);

        // Decode JSON data to PHP array
        $data = json_decode($json, true);

        // Check if JSON decoding was successful
        if ($data === null) {
            $this->command->info("Error decoding JSON file: $path");
            return;
        }

        // Initialize Guzzle client
        $client = new Client();

        // Loop through the data and create entries in the database
        foreach ($data as $item) {
            try {
                // Trim spaces from the URL
                $imageUrl = trim($item['foto_profile']);  // Ganti 'image' dengan 'foto_profile'
                $imageName = basename($imageUrl);
                $imagePath = 'public/profile/' . $imageName;

                // Download the image using Guzzle
                $response = $client->get($imageUrl);

                if ($response->getStatusCode() !== 200) {
                    throw new Exception("Failed to download image from $imageUrl");
                }

                $imageData = $response->getBody()->getContents();

                // Save the image to storage
                Storage::put($imagePath, $imageData);

                // Create user record in the database
                $users = User::create([
                    'nama' => trim($item['nama']),
                    'email' => trim($item['email']),
                    'spesialisasi' => trim($item['spesialisasi']),
                    'kecamatan_id' => $item['kecamatan_id'],
                    'role_id' => 2,
                    'foto_profile' => 'profile/' . $imageName,
                    'password' => bcrypt('fotografer'),
                ]);

                $this->command->info('Tambah User ' . $users->nama);
            } catch (Exception $e) {
                Log::error("Error processing item: " . $e->getMessage());
            }
        }
    }
}
