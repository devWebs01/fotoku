<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Galeri;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        $x['title']  = 'Dashboard';
           $user     = User::where('id', Auth::user()->id)->with('role')->first();
        $x['user']   = $user;
        $x['bank']   = Bank::where('fotografer_id', $user->id)->get();
        $x['produk'] = Produk::where('fotografer_id', $user->id)->get();
        $x['galeri'] = Galeri::where('fotografer_id', $user->id)->get();
        // return view('admin.dashboard', $x);
        if($user->role->name == 'admin'){
            return view('admin.dashboard_admin', $x);
        }
        if($user->role->name == 'fotografer'){
            return view('admin.dashboard_fotografer', $x);
        }
        if($user->role->name == 'pelanggan'){
            return view('admin.dashboard_pengguna', $x);
        }

    }
}
