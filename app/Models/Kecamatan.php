<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    public $table = 'kecamatan';

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function fotografer()
    {
        return $this->hasMany(User::class);
    }
}
