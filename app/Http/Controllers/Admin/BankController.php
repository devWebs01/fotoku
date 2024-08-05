<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Bank';
        $x['data'] = Bank::get();

        if ($request->ajax()) {
            $query = Bank::get();

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $editGateSimple = 'update bank';
                $deleteGate = 'delete bank';
                $crudRoutePart = 'bank';
                $nama = $row->no_rek;

                return view('partials.datatablesActions', compact(
                    'editGateSimple',
                    'deleteGate',
                    'crudRoutePart',
                    'row',
                    'nama'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('no_rek', function ($row) {
                return $row->no_rek ? $row->no_rek : '';
            });
            $table->editColumn('atas_nama', function ($row) {
                return $row->atas_nama ? $row->atas_nama : '';
            });
            $table->editColumn('fotografer_id', function ($row) {
                return $row->fotografer_id ? $row->fotografer_id : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.bank.index', $x);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'no_rek' => ['numeric', 'required'],
            'atas_nama' => ['string', 'required'],
        ]);

        DB::beginTransaction();
        try {
            $bank = Bank::create([
                'no_rek' => $request->no_rek,
                'atas_nama' => $request->atas_nama,
                'fotografer_id' => Auth::user()->id,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$bank->id.'</b> berhasil dibuat')->toToast()->toHtml();

            return response()->json([
                'message' => 'Data berhasil ditambah',
            ], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : '.$th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Data gagal dibuat',
            ], 400);
        }

        return back();
    }

    public function get(Request $request)
    {

        try {
            $bank = Bank::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $bank,
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
            'message' => 'Data Bank',
            'data' => $id,
        ], 200);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'no_rek' => ['numeric', 'required'],
            'atas_nama' => ['string', 'required'],
            'fotografer_id' => ['string', 'required'],

        ]);

        DB::beginTransaction();
        try {
            $bankData = Bank::find($request->id);
            $bankData->update([
                'no_rek' => $request->no_rek,
                'atas_nama' => $request->atas_nama,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$bankData->id.'</b> berhasil diupdate')->toToast()->toHtml();

            return response()->json([
                'message' => 'Data berhasil diupdate',
            ], 200);

        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>'.$bankData->id.'</b> gagal diupdate : '.$th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Data gagal diupdate',
            ], 400);
        }

    }

    public function destroy(Bank $bank)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $bank->delete();
            Alert::success('Pemberitahuan', 'Data <b>'.$bank->no_rekening.'</b> berhasil dihapus')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dihapus : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
