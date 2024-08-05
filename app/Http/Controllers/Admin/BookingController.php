<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\FailException;
use App\Models\Jadwal;
use App\Models\Kecamatan;
use App\Models\Produk;
use App\Services\RupiahService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        $x['title']     = 'Booking';
        $x['data']      = Booking::get();
        if ($request->param) {
            $x['link'] = url('admin/booking?') . "param=" . $request->param;
        } else {
            $x['link'] = url('admin/booking');
        }

        if ($request->ajax()) {

            switch ($request->param) {
                case !null:
                    $jadwal = Jadwal::where('tgl_acara', Carbon::createFromFormat('d/m/Y', $request->param)->format('Y-m-d'))->first();

                    if ($jadwal == null) {
                        $query = Booking::where('jadwal_id', 0)->get();
                    } else {
                        if (Auth::user()->role->name == 'pelanggan') {
                            $query = Booking::where([
                                'pelanggan_id' => Auth::user()->id,
                                'jadwal_id' => $jadwal->id,
                            ])->get();
                        } else if (Auth::user()->role->name == 'fotografer') {
                            $query = Booking::where('jadwal_id', $jadwal->id)->whereHas('produk', function ($q) {
                                $q->where('fotografer_id', Auth::user()->id);
                            })->get();
                        } else {
                            $query = Booking::where('jadwal_id', $jadwal->id)->get();
                        }
                    }

                    break;

                default:
                    if (Auth::user()->role->name == 'pelanggan') {
                        $query = Booking::where([
                            'pelanggan_id' => Auth::user()->id,
                        ])->get();
                    } else if (Auth::user()->role->name == 'fotografer') {
                        $query = Booking::whereHas('produk', function ($q) {
                            $q->where('fotografer_id', Auth::user()->id);
                        })->get();
                    } else {
                        $query = Booking::get();
                    }
                    break;
            }

            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'show booking';
                $dpGate        = 'update booking';
                $lunasGate     = 'update booking';
                $batalGate     = 'delete booking';
                $crudRoutePart = 'booking';
                $nama          = $row->pelanggan->nama . ' Pada tanggal, ' . Carbon::parse($row->jadwal->tgl_acara)->format('d M Y');
                if (Auth::user()->role->name == 'pelanggan') {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'dpGate',
                        'lunasGate',
                        'batalGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));
                } else {
                    return view('partials.datatablesActions', compact(
                        'viewGate',
                        'batalGate',
                        'crudRoutePart',
                        'row',
                        'nama'
                    ));
                }
            });

            $table->editColumn('pelanggan_id', function ($row) {
                return $row->pelanggan_id ? $row->pelanggan->nama : "";
            });

            $table->editColumn('produk_id', function ($row) {
                return $row->produk_id ? $row->produk->nama_produk : "";
            });

            $table->editColumn('jadwal', function ($row) {
                return $row->jadwal_id ? Carbon::parse($row->jadwal->tgl_acara)->format('d M Y') : "";
            });

            $table->editColumn('total_booking', function ($row, RupiahService $rupiahService) {
                return $row->total_booking ? $rupiahService->convertRupiah($row->total_booking)  : "";
            });
            $table->editColumn('total_bayar', function ($row, RupiahService $rupiahService) {
                return $row->total_bayar ? $rupiahService->convertRupiah($row->total_bayar) : "";
            });

            $table->editColumn('jadwal_id', function ($row) {
                return $row->jadwal_id ? $row->jadwal->tgl_acara : "";
            });

            $table->editColumn('status_booking', function ($row) {
                return $row->status_booking ? $row->status_booking : "";
            });


            $table->addIndexColumn();
            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.booking.index', $x);
    }

    public function create(Request $request)
    {
        $x['title']     = 'Buat Jadwal Booking';
        $x['kecamatan'] = Kecamatan::get();
        $x['produk']    = Produk::where('id', $request->produk)->with(['fotografer'])->first();

        return view('admin.booking.create', $x);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fotografer_id'   => ['required'],
            'produk_id'       => ['required'],
            'tgl_acara'       => ['required'],
            'jam'             => ['required'],
            'deskripsi_acara' => ['required'],
        ]);
        DB::beginTransaction();
        try {
            $jadwal = Jadwal::create([
                'tgl_acara'       => Carbon::createFromFormat('d/m/Y', $request->tgl_acara)->format('Y-m-d'),
                'jam'             => $request->jam,
                'status'          => 'Booking',
                'deskripsi_acara' => $request->deskripsi_acara,
            ]);

            $booking = Booking::create([
                'produk_id'      => $request->produk_id,
                'jadwal_id'      => $jadwal->id,
                'status_booking' => 'Booking',
                'pelanggan_id'   => Auth::user()->id,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
            return back();
        }

        return redirect()->route('admin.booking.show', $booking->id);
    }

    public function show(Booking $booking)
    {
        $x['title']     = 'Tampil Booking';
        $x['data']      = $booking;

        return view('admin.booking.show', $x);
    }

    public function get(Request $request)
    {

        try {
            $booking = Booking::findOrFail($request->id);
            return response()->json([
                'message'   => 'Data ',
                'data'      => $booking
            ], 200);
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
            return response()->json([
                'message'   => 'Data tidak ditemukan',
            ], 400);
        }
    }

    public function getAll($id)
    {

        return response()->json([
            'message'   => 'Data Booking',
            'data'      => $id
        ], 200);
    }

    public function editDP(Booking $booking)
    {

        $x['title']    = 'Pembayaran DP Booking';
        $x['data']      = $booking;

        return view('admin.booking.edit_dp', $x);
    }

    public function updateDP(Request $request, RupiahService $rupiahService)
    {
        $this->validate($request, [
            'total_booking' => ['required'],
            'bukti_booking' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            $booking = Booking::find($request->booking_id);

            $request_bukti = $request->file('bukti_booking');
            $name_bukti = time() . '_' . $request_bukti->getClientOriginalName();
            $request_bukti->move(public_path('uploads'), $name_bukti);

            $booking->update([
                'status_booking' => 'DP',
                'total_booking'  => $rupiahService->convertInput($request->total_booking),
                'bukti_booking'  => $name_bukti,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : ' . $th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.booking.show', $booking);
    }

    public function edit(Booking $booking)
    {
        $x['title'] = 'Pelunasan Booking';
        $x['data']  = $booking;
        $x['sisa']  = $booking->produk->harga - $booking->total_booking;

        return view('admin.booking.edit', $x);
    }

    public function update(Request $request, Booking $booking)
    {
        // dd($request->all());
        $this->validate($request, [
            'total_bayar' => ['required'],
            'bukti_bayar' => ['required'],
        ]);

        $rupiahService = new RupiahService;

        DB::beginTransaction();
        try {

            $request_bukti = $request->file('bukti_bayar');
            $name_bukti = time() . '_' . $request_bukti->getClientOriginalName();
            $request_bukti->move(public_path('uploads'), $name_bukti);

            $booking->update([
                'status_booking' => 'Lunas',
                'total_bayar'    => $rupiahService->convertInput($request->total_bayar),
                'bukti_bayar'    => $name_bukti,
            ]);

            DB::commit();
            Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : ' . $th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.booking.show', $booking);
    }

    public function destroy(Booking $booking)
    {
        // if($jenis_permohonan->lockStatus === 1){
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $booking->update([
                "status_booking" => 'Batal',
            ]);
            Jadwal::where('id', $booking->jadwal_id)->update([
                'status' => 'Batal',
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil dibatalkan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibatalkan : ' . $th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
