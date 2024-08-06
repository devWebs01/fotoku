<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $table = 'bank';

    protected $guarded = [];

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
