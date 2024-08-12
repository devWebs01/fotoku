<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\Kecamatan;
use App\Models\Produk;
use App\Services\RupiahService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BookingController extends Controller
{


    // public function index()
    // {
    //     $title = 'Booking';

    //     if ($request->param) {
    //         $link = url('admin/booking?') . 'param=' . $request->param;
    //     } else {
    //         $link = url('admin/booking');
    //     }

    //     switch ($request->param) {
    //         case ! null:
    //             $jadwal = Jadwal::where('tgl_acara', Carbon::createFromFormat('d/m/Y', $request->param)->format('Y-m-d'))->first();
    //             if ($jadwal == null) {
    //                 $query = Booking::where('jadwal_id', 0)->get();
    //             } else {
    //                 if (Auth::user()->role->name == 'pelanggan') {
    //                     $query = Booking::where([
    //                         'pelanggan_id' => Auth::user()->id,
    //                         'jadwal_id' => $jadwal->id,
    //                     ])->get();
    //                 } elseif (Auth::user()->role->name == 'fotografer') {
    //                     $query = Booking::where('jadwal_id', $jadwal->id)->whereHas('produk', function ($q) {
    //                         $q->where('fotografer_id', Auth::user()->id);
    //                     })->get();
    //                 } else {
    //                     $query = Booking::where('jadwal_id', $jadwal->id)->get();
    //                 }
    //             }
    //             break;
    //         default:
    //             if (Auth::user()->role->name == 'pelanggan') {
    //                 $query = Booking::where([
    //                     'pelanggan_id' => Auth::user()->id,
    //                 ])->get();
    //             } elseif (Auth::user()->role->name == 'fotografer') {
    //                 $query = Booking::whereHas('produk', function ($q) {
    //                     $q->where('fotografer_id', Auth::user()->id);
    //                 })->get();
    //             } else {
    //                 $query = Booking::get();
    //             }
    //             break;
    //     }

    //     $data = $query;

    //     return view('admin.booking.index', compact('title', 'data', 'link'));
    // }


    public function index()
    {
        $title = 'Booking';

        // Ambil semua booking yang terkait dengan user yang sedang login
        $bookings = Booking::with(['jadwal', 'pelanggan', 'fotografer', 'produk'])
            ->where(function ($query) {
                if (Auth::user()->role->name == 'pelanggan') {
                    $query->where('pelanggan_id', Auth::user()->id);
                } elseif (Auth::user()->role->name == 'fotografer') {
                    $query->whereHas('produk', function ($query) {
                        $query->where('fotografer_id', Auth::user()->id);
                    });
                }
            })
            ->get();
        // Tambahkan waktu mundur dan format created_at
        $bookings->each(function ($booking) {
            $booking->formatted_created_at = Carbon::parse($booking->created_at)->format('d M Y H:i');
            $booking->time_elapsed = Carbon::parse($booking->created_at)->diffForHumans();
        });

        return view('admin.booking.index', compact('title', 'bookings'));
    }

    public function create(Request $request)
    {
        $x['title'] = 'Buat Jadwal Booking';
        $x['kecamatan'] = Kecamatan::get();
        $x['produk'] = Produk::where('id', $request->produk)->with(['fotografer'])->first();

        return view('admin.booking.create', $x);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'fotografer_id' => ['required'],
            'produk_id' => ['required'],
            'tgl_acara' => ['required'],
            'jam' => ['required'],
            'deskripsi_acara' => ['required'],
        ]);
        $jadwal = Jadwal::create([
            'tgl_acara' => Carbon::createFromFormat('d/m/Y', $request->tgl_acara)->format('Y-m-d'),
            'jam' => $request->jam,
            'status' => 'Booking',
            'deskripsi_acara' => $request->deskripsi_acara,
        ]);

        $booking = Booking::create([
            'produk_id' => $request->produk_id,
            'jadwal_id' => $jadwal->id,
            'status_booking' => 'Booking',
            'pelanggan_id' => Auth::user()->id,
        ]);


        // try {

        //     DB::commit();
        //     Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil dibuat')->toToast()->toHtml();
        // } catch (\Throwable $th) {
        //     DB::rollback();
        //     Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();

        //     return back();
        // }

        return redirect()->route('admin.booking.show', $booking->id);
    }

    public function show(Booking $booking)
    {
        $x['title'] = 'Tampil Booking';
        $x['data'] = $booking;

        return view('admin.booking.show', $x);
    }

    public function get(Request $request)
    {

        try {
            $booking = Booking::findOrFail($request->id);

            return response()->json([
                'message' => 'Data ',
                'data' => $booking,
            ], 200);
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();

            return response()->json([
                'message' => 'Data tidak ditemukan',
            ], 400);
        }
    }

    public function getAll($id)
    {

        return response()->json([
            'message' => 'Data Booking',
            'data' => $id,
        ], 200);
    }

    public function editDP(Booking $booking)
    {

        $x['title'] = 'Pembayaran DP Booking';
        $x['data'] = $booking;

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

            $file = $request->file('bukti_booking');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_booking', $fileName, 'public');

            $booking->update([
                'status_booking' => 'DP',
                'total_booking' => $rupiahService->convertInput($request->total_booking),
                'bukti_booking' => $filePath,
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
        $x['data'] = $booking;
        $x['sisa'] = $booking->produk->harga - $booking->total_booking;

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

            $file = $request->file('bukti_bayar');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('bukti_bayar', $fileName, 'public');

            $booking->update([
                'status_booking' => 'Lunas',
                'total_bayar' => $rupiahService->convertInput($request->total_bayar),
                'bukti_bayar' => $filePath,
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
        try {
            // Periksa panjang dan tipe data status_booking sebelum pembaruan
            $newStatus = 'Cancel';
            if (strlen($newStatus) > 50) {
                throw new \Exception('Status booking terlalu panjang');
            }

            $booking->update([
                'status_booking' => $newStatus,
            ]);
            Jadwal::where('id', $booking->jadwal_id)->update([
                'status' => $newStatus,
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $booking->id . '</b> berhasil dibatalkan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data gagal dibatalkan : ' . $th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
