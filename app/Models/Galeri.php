<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    public $table = 'galeri';

    protected $guarded = [];

    //protected $appends = [
    //    'countData'
    //];

    public function fotografer()
    {
        return $this->belongsTo(User::class, 'fotografer_id', 'id');
    }

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
