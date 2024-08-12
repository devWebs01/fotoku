<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\Fotografer;
use App\Models\Kecamatan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class FotograferController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Data Fotografer';
        $x['data'] = User::get();

        if ($request->ajax()) {
            $query = Fotografer::where('role_id', 2)->get();

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'show user';
                $editGate = 'update user';
                $deleteGate = 'delete user';
                $crudRoutePart = 'fotografer';
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
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('kecamatan', function ($row) {
                return $row->kecamatan_id ? $row->kecamatan->nama_kecamatan : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.fotografer.index', $x);
    }

    public function create()
    {

        $x['title'] = 'Tambah User';
        $x['select'] = kecamatan::get();

        return view('admin.user.create', $x);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama' => ['string', 'required'],
            'no_telp' => ['numeric', 'required'],
            'alamat' => ['string', 'required'],
            'email' => ['required', 'email'],
            'kecamatan_id' => ['string'],
        ]);

        DB::beginTransaction();
        try {
            $user = User::create([
                'nama' => $request->nama,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'password' => bcrypt('fotografer'),
                'status' => 'Aktif',
                'kecamatan_id' => $request->kecamatan_id,
                'role_id' => 2,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$user->id.'</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function show(Fotografer $fotografer)
    {

        $x['title'] = 'Tampil User';
        $x['data'] = $fotografer;

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

    public function getFotograferFromKecamatan($kecamatan_id)
    {
        $fotografer = Fotografer::where('kecamatan_id', $kecamatan_id)->get();

        return response()->json([
            'message' => 'Data User',
            'data' => $fotografer,
        ], 200);
    }

    public function getFotograferFromId($id)
    {
        $fotografer = Fotografer::where('id', $id)->first();

        return response()->json([
            'message' => 'Data User',
            'data' => $fotografer,
        ], 200);
    }

    public function edit(Fotografer $fotografer)
    {
        $x['title'] = 'Edit Fotografer';
        $x['data'] = $fotografer;
        $x['select'] = Kecamatan::get();

        return view('admin.fotografer.edit', $x);
    }

    public function update(Request $request, Fotografer $fotografer)
    {
        // dd($request->all());

        $this->validate($request, [
            'nama' => ['string', 'required'],
            'spesialisasi' => ['string', 'required'],
            'no_telp' => ['numeric', 'required'],
            'alamat' => ['string', 'required'],
            'email' => ['string', 'required'],
            'tgl_lahir' => ['string', 'required'],
            'kecamatan_id' => ['string'],
            'foto_profile' => ['mimes:jpg,bmp,png'],
        ]);

        DB::beginTransaction();
        try {

            if ($request->hasFile('foto_profile')) {
                $file = $request->file('foto_profile');
                $fileName = time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs('profile', $fileName, 'public');

                $fotografer->update([
                    'foto_profile' => $filePath,
                ]);
            }
            $fotografer->update([
                'nama' => $request->nama,
                'spesialisasi' => $request->spesialisasi,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'tgl_lahir' => Carbon::createFromFormat('d/m/Y', $request->tgl_lahir)->format('Y-m-d'),
                'kecamatan_id' => $request->kecamatan_id,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$fotografer->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>'.$fotografer->id.'</b> gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect('/admin/dashboard');
    }

    public function destroy(Fotografer $fotografer)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $fotografer->delete();
            Alert::success('Pemberitahuan', 'Data <b>'.$fotografer->nama.'</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dihapus : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
