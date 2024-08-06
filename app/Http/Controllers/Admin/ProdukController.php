<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Services\RupiahService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Produk';
        $x['data'] = Produk::get();

        if ($request->ajax()) {
            if (Auth::user()->role->name == 'fotografer') {
                $query = Produk::where('fotografer_id', Auth::user()->id)->get();
            } else {
                $query = Produk::get();
            }
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'show produk';
                $editGate = 'update produk';
                $deleteGate = 'delete produk';
                $crudRoutePart = 'produk';
                $nama = $row->nama_produk;

                if (Auth::user()->role->name == 'fotografer') {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));
                } else {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));

                }
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('nama_produk', function ($row) {
                return $row->nama_produk ? $row->nama_produk : '';
            });
            $table->editColumn('harga', function ($row) {
                return $row->harga ? $row->harga : '';
            });
            $table->editColumn('info', function ($row) {
                return $row->info ? $row->info : '';
            });
            $table->editColumn('gambar_1', function ($row) {
                return $row->gambar_1 ? "<img src='".Storage::url($row->gambar_1)."' width='100px; hight=100px; style='object-fit:cover;'>" : '';
            });
            $table->editColumn('gambar_2', function ($row) {
                return $row->gambar_2 ? "<img src='".Storage::url($row->gambar_2)."' width='100px; hight=100px; style='object-fit:cover;'>" : '';
            });
            $table->editColumn('fotografer', function ($row) {
                return $row->fotografer_id ? $row->fotografer->nama : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder', 'gambar_1', 'gambar_2']);

            return $table->make(true);
        }

        return view('admin.produk.index', $x);
    }

    public function create()
    {

        $x['title'] = 'Tambah Produk';

        return view('admin.produk.create', $x);
    }

    public function store(Request $request, RupiahService $rupiahService)
    {
        $this->validate($request, [
            'nama_produk' => ['string', 'required'],
            'harga' => ['string', 'required'],
            'info' => ['string', 'required'],
            'gambar_1' => ['mimes:jpg,bmp,png', 'required'],
            'gambar_2' => ['mimes:jpg,bmp,png', 'required'],
        ]);

        DB::beginTransaction();
        try {

            $file1 = $request->file('gambar_1');
            $fileName1 = time().'_'.$file1->getClientOriginalName();
            $filePath1 = $file1->storeAs('product', $fileName1, 'public');

            $file2 = $request->file('gambar_2');
            $fileName2 = time().'_'.$file2->getClientOriginalName();
            $filePath2 = $file2->storeAs('product', $fileName2, 'public');

            $produk = Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga' => $rupiahService->convertInput($request->harga),
                'info' => $request->info,
                'gambar_1' => $filePath1,
                'gambar_2' => $filePath2,
                'fotografer_id' => Auth::user()->id,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$produk->id.'</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function show(Produk $produk)
    {
        $x['title'] = 'Tampil Produk';
        $x['data'] = $produk;

        return view('admin.produk.show', $x);
    }

    public function get(Request $request)
    {

        try {
            $produk = Produk::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $produk,
            ], 200);
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibuat : '.$th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 400);
        }
    }

    public function getProdukFromUser($fotografer_id)
    {
        $produk = Produk::where('fotografer_id', $fotografer_id)->get();

        return response()->json([
            'message' => 'Data Produk',
            'data' => $produk,
        ], 200);
    }

    public function edit(Produk $produk)
    {
        $x['title'] = 'Edit Produk';
        $x['data'] = $produk;

        return view('admin.produk.edit', $x);
    }

    public function update(Request $request, Produk $produk)
    {
        $this->validate($request, [
            'nama_produk' => ['string', 'required'],
            'harga' => ['string', 'required'],
            'info' => ['string', 'required'],
            'gambar_1' => ['mimes:jpg,bmp,png'],
            'gambar_2' => ['mimes:jpg,bmp,png'],
        ]);

        DB::beginTransaction();
        try {

            if ($request->hasFile('gambar_1')) {
                $file1 = $request->file('gambar_1');
                $fileName1 = time().'_'.$file1->getClientOriginalName();
                $filePath1 = $file1->storeAs('product', $fileName1, 'public');

                $produk->update([
                    'gambar_1' => $filePath1,
                ]);
            }

            if ($request->hasFile('gambar_2')) {
                $file2 = $request->file('gambar_2');
                $fileName2 = time().'_'.$file2->getClientOriginalName();
                $filePath2 = $file2->storeAs('product', $fileName2, 'public');

                $produk->update([
                    'gambar_2' => $filePath2,
                ]);
            }

            $rupiahService = new RupiahService;
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $rupiahService->convertInput($request->harga),
                'info' => $request->info,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$produk->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.produk.show', $produk);
    }

    public function destroy(Produk $produk)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $produk->delete();
            Alert::success('Pemberitahuan', 'Data <b>'.$produk->nama_produk.'</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dihapus : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
