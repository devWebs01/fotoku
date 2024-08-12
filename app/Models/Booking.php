<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $table = 'booking';

    protected $guarded = [];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'pelanggan_id'); // Assuming 'pelanggan_id' refers to the user who made the booking
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function fotografer()
    {
        return $this->hasOneThrough(Fotografer::class, Produk::class, 'id', 'id', 'produk_id', 'fotografer_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pelanggan_id');
    }
}
