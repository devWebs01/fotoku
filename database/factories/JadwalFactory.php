<?php

namespace Database\Factories;

use Carbon\Carbon;
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
        $now = Carbon::now();

        // Status jadwal (Booking, Cancel, Selesai)
        $status = $this->faker->randomElement(['Booking', 'Cancel', 'Selesai']);

        // Tentukan `created_at` yang realistis (tidak mungkin di masa depan)
        $createdAt = $this->faker->dateTimeBetween('-2 days', $now)->format('Y-m-d H:i:s');

        // `updated_at` harus lebih besar atau sama dengan `created_at`
        $updatedAt = $this->faker->dateTimeBetween($createdAt, $now)->format('Y-m-d H:i:s');

        // Tentukan `tgl_acara` bisa di masa lalu atau masa depan
        $tglAcara = $this->faker->boolean(50)
            ? $this->faker->dateTimeBetween('-2 days', '-1 minute')->format('Y-m-d H:i:s') // Past date
            : $this->faker->dateTimeBetween('now', '+2 days')->format('Y-m-d H:i:s'); // Future date

        return [
            'tgl_acara' => $tglAcara,
            'status' => $status,
            'jam' => $this->faker->time(),
            'link_foto' => in_array($status, ['Booking', 'Cancel']) ? null : $this->faker->url(),
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,

        ];
    }
}
