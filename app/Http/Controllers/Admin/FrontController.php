<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Fotografer;
use App\Models\Galeri;
use App\Models\Kecamatan;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class FrontController extends Controller
{
    public function index()
    {
        $fotografer = Fotografer::where('role_id', 2)->with('kecamatan', 'produk')->take('3')->get();

        return view('front', compact('fotografer'));
    }

    public function fotografer(Request $request)
    {
        if ($request->kec && ($request->kec != 'all')) {
            $fotografer = Fotografer::where('role_id', 2)->where('kecamatan_id', $request->kec)->with('kecamatan')->get();
        } else {
            $fotografer = Fotografer::where('role_id', 2)->with('kecamatan')->get();
        }

        $kecamatan = Kecamatan::get();
        $param = $request->kec ?? '';

        return view('front_fotografer', compact('fotografer', 'kecamatan', 'param'));
    }

    public function fotograferDetail($id)
    {
        $fotografer = Fotografer::where('id', $id)->with('kecamatan')->first();
        $bank = Bank::where('fotografer_id', $fotografer->id)->get();
        $produk = Produk::where('fotografer_id', $fotografer->id)->get();
        $galeri = Galeri::where('fotografer_id', $fotografer->id)->get();

        return view('detail_fotografer', compact('fotografer', 'bank', 'produk', 'galeri'));
    }

    public function daftar(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'role_id' => ['required'],
            'email' => ['required', 'unique:users'],
            'no_telp' => ['required'],
            'password' => ['required'],
            'alamat' => ['required'],
        ]);

        try {
            DB::beginTransaction();
            $user = User::create([
                'nama' => $request->name,
                'role_id' => $request->role_id,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'password' => bcrypt($request->password),
                'status' => 'Aktif',
            ]);
            DB::commit();

            $apikey = '77580890196eaf5a13b484449e4c45ec53fbe57f';
            $tujuan = trim($request->no_telp);
            $pesan = 'Selamat Datang, ' . $request->name . ' dengan email : ' . $request->email . ' di Aplikasi eMarketplace Fotografer, Silakan lengkapi data profile anda untuk kenyamanan penggunaan aplikasi. Terima Kasih';

            // $curl = curl_init();

            // curl_setopt_array($curl, array(
            //     CURLOPT_URL => 'https://starsender.online/api/sendText?message='.rawurlencode($pesan).'&tujuan='.rawurlencode($tujuan.'@s.whatsapp.net'),
            //     CURLOPT_SSL_VERIFYPEER => 0,
            //     CURLOPT_RETURNTRANSFER => true,
            //     CURLOPT_ENCODING => '',
            //     CURLOPT_MAXREDIRS => 10,
            //     CURLOPT_TIMEOUT => 0,
            //     CURLOPT_FOLLOWLOCATION => true,
            //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //     CURLOPT_CUSTOMREQUEST => 'POST',
            //     CURLOPT_HTTPHEADER => array(
            //         'apikey: '.$apikey
            //     ),
            // ));

            // $response = curl_exec($curl);

            // curl_close($curl);

            Alert::success('Pemberitahuan', 'Data <b>' . $user->nama . '</b> berhasil dibuat')->toToast()->toHtml();

            return redirect(route('login'));
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
        }
    }
}
