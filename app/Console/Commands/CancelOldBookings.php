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
        $cutoffTime = Carbon::now()->subHours(24);

        $bookings = Jadwal::where('created_at', '<=', $cutoffTime)
            ->where('status', 'Booking')
            ->get();

        foreach ($bookings as $booking) {
            $booking->update([
                'status' => 'Cancel',
            ]);
        }

        $this->info('Successfully canceled old bookings with status Booking.');
    }
}
