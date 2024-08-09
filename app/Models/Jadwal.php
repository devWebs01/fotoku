<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    use HasFactory;

    public $table = 'jadwal';

    protected $guarded = [];

    /**
     * Get all of the bookings for the Jadwal
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
