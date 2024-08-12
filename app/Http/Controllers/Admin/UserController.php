<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Data Pelanggan';
        $x['data'] = User::get();

        if ($request->ajax()) {
            $query = User::where('role_id', 3)->get();

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'show user';
                $editGate = 'update user';
                $deleteGate = 'delete user';
                $crudRoutePart = 'pelanggan';
                $nama = $row->nama;

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row',
                    'nama'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('no_telp', function ($row) {
                return $row->no_telp ? $row->no_telp : '';
            });
            $table->editColumn('alamat', function ($row) {
                return $row->alamat ? $row->alamat : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('password', function ($row) {
                return $row->password ? $row->password : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.user.index', $x);
    }

    public function create()
    {

        $x['title'] = 'Tambah User';

        return view('admin.user.create', $x);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama' => ['string', 'required'],
            'no_telp' => ['numeric', 'required'],
            'alamat' => ['string', 'required'],
            'email' => ['string', 'required'],
            'password' => ['string', 'required'],
            'status' => ['string', 'required'],
            'tgl_lahir' => ['string', 'required'],
            'komunitas_id' => ['string'],
            'foto_profile' => ['mimes:jpg,bmp,png'],
            'role' => ['string', 'required'],

        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => $request->password,
                'status' => $request->status,
                'tgl_lahir' => $request->tgl_lahir,
                'komunitas_id' => $request->komunitas_id,
                'foto_profile' => $request->foto_profile,
                'role' => $request->role,

            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$user->id.'</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>'.$user->id.'</b> gagal dibuat : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function show(User $pelanggan)
    {

        $x['title'] = 'Tampil Data Pelanggan';
        $x['data'] = $pelanggan;

        return view('admin.user.show', $x);
    }

    public function get(Request $request)
    {

        try {
            $user = User::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $user,
            ], 200);
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibuat : '.$th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 400);
        }
    }

    public function getAll($id)
    {

        return response()->json([
            'message' => 'Data User',
            'data' => $id,
        ], 200);
    }

    public function edit(User $pelanggan)
    {
        $x['title'] = 'Edit Pelanggan';
        $x['data'] = $pelanggan;

        return view('admin.user.edit_pelanggan', $x);
    }

    public function update(Request $request, User $pelanggan)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama' => ['string', 'required'],
            'no_telp' => ['numeric', 'required'],
            'alamat' => ['string', 'required'],
            'email' => ['string', 'required'],
            'tgl_lahir' => ['string', 'required'],
            'foto_profile' => ['mimes:jpg,bmp,png'],
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('foto_profile')) {
                $file = $request->file('foto_profile');
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('profile', $fileName, 'public');

                $pelanggan->update([
                    'foto_profile' => $filePath,
                ]);
            }

            $pelanggan->update([
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'tgl_lahir' => Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d'),
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$pelanggan->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect('/admin/dashboard');
    }

    public function destroy(User $pelanggan)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $pelanggan->delete();
            Alert::success('Pemberitahuan', 'Data <b>'.$pelanggan->nama.'</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dihapus : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function gantiPassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required|string|min:8',
        ]);

        DB::beginTransaction();
        try {
            $user = $request->user();
            $currentPassword = $request->input('oldPassword');
            $newPassword = $request->input('newPassword');

            if (! Hash::check($currentPassword, $user->password)) {
                return response()->json([
                    'message' => 'Password Lama Tidak Benar',
                ], 401);
            }

            $user->password = Hash::make($newPassword);
            $user->save();

            DB::commit();
            Alert::success('Pemberitahuan', 'Password Berhasil Diupdate')->toToast()->toHtml();

            return response()->json([
                'message' => 'Data berhasil Diupdate',
            ], 200);
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Password Gagal Diupdate : '.$th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Password Gagal Diupdate',
                'error' => $th,
            ], 400);
        }

        return back();
    }
}
