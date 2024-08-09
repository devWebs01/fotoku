<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $table = 'booking';

    protected $guarded = [];

    //protected $appends = [
    //    'countData'
    //];

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
