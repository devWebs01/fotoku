<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

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
