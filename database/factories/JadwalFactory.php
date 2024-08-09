<?php

namespace Database\Factories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Jadwal::class;

    public function definition()
    {
        return [
            'tgl_acara' => $this->faker->date(),
            'jam' => $this->faker->time(),
            'status' => $this->faker->randomElement(['Booking', 'Cancel', 'Selesai']),
            'link_foto' => $this->faker->url(),
        ];
    }
}
