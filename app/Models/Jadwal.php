<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jadwal extends Model
{
    public $table = 'jadwal';

    protected $guarded = [];

    /**
     * Get all of the bookings for the Jadwal
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    //protected $appends = [
    //    'countData'
    //];

    // public function relasi()
    // {
    //     return $this->belongsTo(Relasi::class);
    // }

    // public function anggota()
    // {
    //     return $this->hasMany(Anggota::class);
    // }

    //public function getCountDataAttribute()
    //{
    //    return $this->anggota()->count();
    //}

    // public function getCreatedAtAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format("d-M-Y H:i:s") : null;
    // }

}
