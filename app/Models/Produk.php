<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $table = 'produk';

    protected $guarded = [];

    protected $appends = [
       'countData'
    ];

    public function fotografer ()
    {
    	return $this->belongsTo(Fotografer::class, 'fotografer_id', 'id');
    }

    public function booking () 
    {
        return $this->hasMany(Booking::class);
    }
    
    public function getCountDataAttribute()
    {
       return $this->booking()->count();
    }

    // public function getCreatedAtAttribute($value)
    // {
    //     return $value ? Carbon::parse($value)->format("d-M-Y H:i:s") : null;
    // }

}
