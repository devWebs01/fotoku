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

    public function user()
    {
        return $this->belongsTo(User::class, 'fotografer_id');
    }
}
