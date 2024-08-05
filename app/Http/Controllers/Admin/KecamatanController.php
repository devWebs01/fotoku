<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kecamatan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\FailException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KecamatanController extends Controller
{
   
    public function index(Request $request)
    {
        $x['title']     = 'Kecamatan';
        $x['data']      = Kecamatan::get();

        if ($request->ajax()) {
            $query = Kecamatan::get();

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGateSimple  = 'update kecamatan';
                $deleteGate      = 'delete kecamatan';
                $crudRoutePart   = 'kecamatan';
                $nama            = $row->nama_kecamatan;

                return view('partials.datatablesActions', compact(
                    'editGateSimple',
                    'deleteGate',
                    'crudRoutePart',
                    'row',
                    'nama'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });

            $table->editColumn('nama_kecamatan', function ($row) { 
				return $row->nama_kecamatan ? $row->nama_kecamatan : '' ; 
 			});
			$table->editColumn('keterangan', function ($row) { 
				return $row->keterangan ? $row->keterangan : '' ; 
 			});
					
            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kecamatan.index', $x);
    }

    public function store(Request $request)
    {
        $this->validate($request, [          
            'nama_kecamatan' => ['string','required'],
        ]);
        
        DB::beginTransaction();
        try {
            $kecamatan = Kecamatan::create([
                'nama_kecamatan' => $request->nama_kecamatan,
				'keterangan' => $request->keterangan,
            ]);
           
            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $kecamatan->id . '</b> berhasil dibuat')->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data berhasil ditambah',
            ],200);

        } catch (\Throwable $th) {
            dd($th);
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>' . $kecamatan->id . '</b> gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data gagal dibuat',
            ],400);
        }

        return back();
    }

    public function get(Request $request)
    {
        try {
            $kecamatan = Kecamatan::findOrFail($request->id);
            return response()->json([
                'message'   => 'Data ',
                'data'      => $kecamatan
            ], 200);
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data tidak ditemukan',
            ],400);
        }
    }

    public function getAll($id)
    {
        return response()->json([
            'message'   => 'Data kecamatan',
            'data'      => $id
        ], 200);
    }

    public function update(Request $request)
    {
        $this->validate($request, [          
            'nama_kecamatan' => ['string','required'],
        ]);

        DB::beginTransaction();
        try {
            $kecamatanData = Kecamatan::find($request->id);
            $kecamatanData->update([
                'nama_kecamatan' => $request->nama_kecamatan,
				'keterangan' => $request->keterangan,
				
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $kecamatanData->id . '</b> berhasil diupdate')->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data berhasil diupdate',
            ],200);
            
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>' . $kecamatanData->id . '</b> gagal diupdate : ' . $th->getMessage())->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data gagal diupdate',
            ],400);
        }

    }

    public function destroy(Kecamatan $kecamatan)
    {
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $kecamatan->delete();
            Alert::success('Pemberitahuan', 'Data <b>' . $kecamatan->nama_kecamatan . '</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $kecamatan->nama_kecamatan . '</b> gagal dihapus : ' . $th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
