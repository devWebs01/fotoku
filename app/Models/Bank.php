<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public $table = 'bank';

    protected $guarded = [];

    public function fotografer()
    {
        return $this->belongsTo(User::class, 'fotografer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fotografer_id');
    }
}
