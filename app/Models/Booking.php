<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $table = 'booking';

    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'pelanggan_id', 'id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'pelanggan_id');
    }
}
