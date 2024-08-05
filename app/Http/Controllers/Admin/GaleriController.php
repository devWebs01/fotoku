<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Galeri';
        $x['data'] = Galeri::get();

        if ($request->ajax()) {
            if (Auth::user()->role->name == 'fotografer') {
                $query = Galeri::where('fotografer_id', Auth::user()->id)->get();
            } else {
                $query = Galeri::get();
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGate = 'update galeri';
                $deleteGate = 'delete galeri';
                $crudRoutePart = 'galeri';
                $nama = $row->judul;

                return view('partials.datatablesActions', compact(
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

            $table->editColumn('name', function ($row) {
                return $row->name ? "<img src='".asset('uploads/'.$row->name)."' width='300px;'>" : '';
            });
            $table->editColumn('judul', function ($row) {
                return $row->judul ? $row->judul : '';
            });
            $table->editColumn('deskripsi', function ($row) {
                return $row->deskripsi ? $row->deskripsi : '';
            });
            $table->editColumn('fotografer', function ($row) {
                return $row->fotografer_id ? $row->fotografer->nama : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder', 'name']);

            return $table->make(true);
        }

        return view('admin.galeri.index', $x);
    }

    public function create()
    {

        $x['title'] = 'Tambah Galeri';

        return view('admin.galeri.create', $x);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => ['mimes:jpg,bmp,png', 'required'],
            'judul' => ['string', 'required'],
            'deskripsi' => ['string', 'required'],
        ]);

        DB::beginTransaction();
        try {
            $request_file = $request->file('file');
            $name_file = time().'_'.$request_file->getClientOriginalName();
            $request_file->move(public_path('uploads'), $name_file);

            $galeri = Galeri::create([
                'name' => $name_file,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'fotografer_id' => Auth::user()->id,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$galeri->id.'</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data  gagal dibuat : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function show(Galeri $galeri)
    {

        $x['title'] = 'Tampil Galeri';
        $x['data'] = $galeri;

        return view('admin.galeri.show', $x);
    }

    public function get(Request $request)
    {

        try {
            $galeri = Galeri::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $galeri,
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
            'message' => 'Data Galeri',
            'data' => $id,
        ], 200);
    }

    public function edit(Galeri $galeri)
    {

        $x['title'] = 'Edit Galeri';
        $x['data'] = $galeri;

        return view('admin.galeri.edit', $x);
    }

    public function update(Request $request, Galeri $galeri)
    {
        $this->validate($request, [
            'judul' => ['string', 'required'],
            'deskripsi' => ['string', 'required'],
        ]);

        DB::beginTransaction();
        try {

            if ($request->file('file')) {
                $request_file = $request->file('file');
                $name_file = time().'_'.$request_file->getClientOriginalName();
                $request_file->move(public_path('uploads'), $name_file);

                $galeri->update([
                    'name' => $name_file,
                ]);
            }

            $galeri->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$galeri->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>'.$galeri->id.'</b> gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.galeri.show', $galeri);
    }

    public function destroy(Galeri $galeri)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $galeri->delete();
            Alert::success('Pemberitahuan', 'Data <b>'.$galeri->id.'</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>'.$galeri->id.'</b> gagal dihapus : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
