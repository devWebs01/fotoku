<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\FailException;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Jadwal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $x['title'] = 'Jadwal';
        $x['data'] = Jadwal::get();

        if ($request->ajax()) {
            if (Auth::user()->role->name == 'pelanggan') {
                $booking = Booking::where('pelanggan_id', Auth::user()->id)->pluck('jadwal_id');
                $query = Jadwal::wherein('id', $booking)->get();
            } elseif (Auth::user()->role->name == 'fotografer') {
                $booking = Booking::whereHas('produk', function ($q) {
                    $q->where('fotografer_id', Auth::user()->id);
                })->pluck('jadwal_id');
                $query = Jadwal::wherein('id', $booking)->get();
            } else {
                $query = Jadwal::get();
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'show jadwal';
                $editGate = 'update jadwal';
                $jadwalGate = 'update jadwal';
                $batalGate = 'delete booking';
                $crudRoutePart = 'jadwal';
                $nama = ' Pada tanggal, '.Carbon::parse($row->tgl_acara)->format('d M Y');

                if (Auth::user()->role->name == 'fotografer') {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'editGate',
                        'jadwalGate',
                        'batalGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));
                } else {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));
                }

            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });

            $table->editColumn('tgl_acara', function ($row) {
                return $row->tgl_acara ? Carbon::parse($row->tgl_acara)->format('d M Y') : '';
            });
            $table->editColumn('jam', function ($row) {
                return $row->jam ? $row->jam : '';
            });
            $table->editColumn('deskripsi_acara', function ($row) {
                return $row->deskripsi_acara ? $row->deskripsi_acara : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('keterangan', function ($row) {
                $booking = Booking::where('jadwal_id', $row->id)->first();
                if (Auth::user()->role->name == 'pelanggan') {
                    $ket = 'Fotografer : '.$booking->produk->fotografer->nama.'<br/>
                            Produk/ Paket : '.$booking->produk->nama_produk.'<br/>
                            Status Booking : '.$booking->status_booking.'
                            ';
                } elseif (Auth::user()->role->name == 'fotografer') {
                    $ket = 'Pelanggan :  '.$booking->pelanggan->nama.'<br/>
                            Produk/ Paket : '.$booking->produk->nama_produk.'<br/>
                            Status Booking : '.$booking->status_booking.'
                    ';
                } else {
                    $ket = 'Fotografer : '.$booking->produk->fotografer->nama.'<br/>
                            Pelanggan : '.$booking->pelanggan->nama.'<br/>
                            Produk/ Paket : '.$booking->produk->nama_produk.'<br/>
                            Status Booking : '.$booking->status_booking.'
                    ';
                }

                return $row->id ? $ket : '';
            });

            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder', 'keterangan']);

            return $table->make(true);
        }

        return view('admin.jadwal.index', $x);
    }

    public function create()
    {
        $x['title'] = 'Tambah Jadwal';

        return view('admin.jadwal.create', $x);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_acara' => ['string', 'required'],
            'jam' => ['string', 'required'],
            'status' => ['string', 'required'],
            'link_foto' => ['string', 'required'],

        ]);

        DB::beginTransaction();
        try {
            $jadwal = Jadwal::create([
                'tgl_acara' => $request->tgl_acara,
                'jam' => $request->jam,
                'status' => $request->status,
                'link_foto' => $request->link_foto,

            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> gagal dibuat : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }

    public function show(Jadwal $jadwal)
    {
        $x['title'] = 'Tampil Jadwal';
        $x['data'] = $jadwal;

        return view('admin.jadwal.show', $x);
    }

    public function get(Request $request)
    {
        try {
            $jadwal = Jadwal::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $jadwal,
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
            'message' => 'Data Jadwal',
            'data' => $id,
        ], 200);
    }

    public function editStatus(Jadwal $jadwal)
    {
        $x['title'] = 'Selesaikan Jadwal';
        $x['data'] = $jadwal;

        return view('admin.jadwal.edit_status', $x);
    }

    public function updateStatus(Request $request, Jadwal $jadwal)
    {
        $this->validate($request, [
            'status' => ['required'],
            'link_foto' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $jadwal = Jadwal::find($request->jadwal_id);
            $jadwal->update([
                'status' => $request->status,
                'link_foto' => $request->link_foto,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.jadwal.index');
    }

    public function edit(Jadwal $jadwal)
    {
        $x['title'] = 'Edit Jadwal';
        $x['data'] = $jadwal;

        return view('admin.jadwal.edit', $x);
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $this->validate($request, [
            'tgl_acara' => ['string', 'required'],
            'jam' => ['string', 'required'],
        ]);

        DB::beginTransaction();
        try {
            $jadwal->update([
                'tgl_acara' => Carbon::createFromFormat('d/m/Y', $request->tgl_acara)->format('Y-m-d'),
                'jam' => $request->jam,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : '.$th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.jadwal.index');
    }

    public function destroy(Jadwal $jadwal)
    {
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $jadwal->update([
                'status' => 'Batal',
            ]);
            Alert::success('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> berhasil dibatalkan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>'.$jadwal->id.'</b> gagal dibatalkan : '.$th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
