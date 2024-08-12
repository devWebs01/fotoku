<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use App\Models\Jadwal;
use Carbon\Carbon;

class CancelOldBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'booking:cancel-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel bookings that are older than 24 hours with status DP';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $currentDateTime = Carbon::now();

        // Mengambil semua booking yang terkait dengan jadwal yang sudah kadaluarsa
        $bookings = Booking::whereHas('jadwal', function ($query) use ($currentDateTime) {
            $query->where('tgl_acara', '<', $currentDateTime->toDateString())
                ->orWhere(function ($query) use ($currentDateTime) {
                    $query->where('tgl_acara', '=', $currentDateTime->toDateString())
                        ->where('jam', '<', $currentDateTime->toTimeString());
                })
                ->where('status', 'Booking'); // Filter berdasarkan status dari Jadwal
        })
            ->get();

        foreach ($bookings as $booking) {
            // Check if the booking is older than 24 hours or if the schedule date has passed
            if ($booking->created_at->lt(now()->subHours(24)) || $booking->jadwal->tgl_acara < now()->format('Y-m-d')) {
                // Cancel the booking
                $booking->jadwal->update(['status' => 'Cancel']);
            }
        }




        $this->info('Successfully canceled old bookings with status Booking.');
    }
}
