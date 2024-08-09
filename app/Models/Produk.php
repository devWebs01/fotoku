<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $table = 'produk';

    protected $guarded = [];

    protected $appends = [
        'countData',
    ];

    public function fotografer()
    {
        return $this->belongsTo(Fotografer::class, 'fotografer_id', 'id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function getCountDataAttribute()
    {
        return $this->booking()->count();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fotografer_id');
    }
}
