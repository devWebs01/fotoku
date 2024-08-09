<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bank>
 */
class BankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Ambil pengguna dengan role "Pelanggan"
        $fotografer_id = User::whereHas('role', function ($query) {
            $query->where('id', '2');
        })->inRandomOrder()->first();

        return [
            'no_rek' => $this->faker->bankAccountNumber(),
            'atas_nama' => $this->faker->name(),
            'fotografer_id' => $fotografer_id,
        ];
    }
}
