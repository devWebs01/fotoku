<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;

// use Spatie\Permission\Traits\HasRoles;

class Fotografer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // use HasRoles;
    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    protected $appends = [
        'countData',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function transaksi()
    {
        $produk = Produk::where('fotografer_id', $this->id)->get();
        $transaksi = 0;
        foreach ($produk as $item) {
            $transaksi += $item->countData;
        }

        return $transaksi;
    }

    public function getCountDataAttribute()
    {
        return $this->transaksi();
    }
}
