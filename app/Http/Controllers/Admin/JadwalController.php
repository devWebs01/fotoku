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

    // public function index(Request $request)
    // {
    //     $title = 'Jadwal';

    //     if (Auth::check() && Auth::user()->role->name == 'pelanggan') {

    //         $bookingIds = Booking::where('pelanggan_id', Auth::user()->id)->pluck('jadwal_id');
    //         $jadwals = Jadwal::whereIn('id', $bookingIds)->get();
    //     } elseif (Auth::check() && Auth::user()->role->name == 'fotografer') {

    //         $bookingIds = Booking::whereHas('produk', function ($query) {
    //             $query->where('fotografer_id', Auth::user()->id);
    //         })->pluck('jadwal_id');

    //         $jadwals = Jadwal::whereIn('id', $bookingIds)->get();
    //     } else {

    //         $jadwals = Jadwal::all();
    //     }

    //     $data = $jadwals->map(function ($jadwal) {
    //         $booking = Booking::where('jadwal_id', $jadwal->id)->first();

    //         if ($booking) {
    //             $jadwal->tanggal_acara = Carbon::parse($jadwal->tgl_acara)->format('d M Y');
    //             $jadwal->jam = $jadwal->jam;
    //             $jadwal->deskripsi_acara = $jadwal->deskripsi_acara;
    //             $jadwal->status = $jadwal->status;

    //             // Tambahkan keterangan sesuai peran
    //             if (Auth::check() && Auth::user()->role->name == 'pelanggan') {
    //                 $fotograferNama = optional(optional($booking->produk)->fotografer)->nama;
    //                 $produkNama = optional($booking->produk)->nama_produk;
    //                 $statusBooking = optional($booking)->status_booking;

    //                 $jadwal->keterangan = "Fotografer: $fotograferNama<br/>Produk/Paket: $produkNama<br/>Status Booking: $statusBooking";
    //             } elseif (Auth::check() && Auth::user()->role->name == 'fotografer') {
    //                 $pelangganNama = optional($booking->pelanggan)->nama;
    //                 $produkNama = optional($booking->produk)->nama_produk;
    //                 $statusBooking = optional($booking)->status_booking;

    //                 $jadwal->keterangan = "Pelanggan: $pelangganNama<br/>Produk/Paket: $produkNama<br/>Status Booking: $statusBooking";
    //             } else {
    //                 $fotograferNama = optional(optional($booking->produk)->fotografer)->nama;
    //                 $pelangganNama = optional($booking->pelanggan)->nama;
    //                 $produkNama = optional($booking->produk)->nama_produk;
    //                 $statusBooking = optional($booking)->status_booking;

    //                 $jadwal->keterangan = "Fotografer: $fotograferNama<br/>Pelanggan: $pelangganNama<br/>Produk/Paket: $produkNama<br/>Status Booking: $statusBooking";
    //             }
    //         } else {
    //             $jadwal->tanggal_acara = 'Tanggal tidak ditemukan';
    //             $jadwal->jam = 'Jam tidak ditemukan';
    //             $jadwal->deskripsi_acara = 'Deskripsi tidak ditemukan';
    //             $jadwal->status = 'Status tidak ditemukan';
    //             $jadwal->keterangan = 'Keterangan tidak ditemukan';
    //         }

    //         return $jadwal;
    //     });


    //     return view('admin.jadwal.index', compact('title', 'data'));
    // }


    public function index()
    {
        $title = 'Jadwal';

        if (Auth::check() && Auth::user()->role->name == 'pelanggan') {
            $bookingIds = Booking::where('pelanggan_id', Auth::user()->id)->pluck('jadwal_id');
            $jadwals = Jadwal::whereIn('id', $bookingIds)->get();
        } elseif (Auth::check() && Auth::user()->role->name == 'fotografer') {
            $bookingIds = Booking::whereHas('produk', function ($query) {
                $query->where('fotografer_id', Auth::user()->id);
            })->pluck('jadwal_id');
            $jadwals = Jadwal::whereIn('id', $bookingIds)->get();
        } else {
            $jadwals = Jadwal::where('status', '!=', 'Booking')->get();
        }

        return view('admin.jadwal.index', compact('title', 'jadwals'));
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
            Alert::success('Pemberitahuan', 'Data <b>' . $jadwal->id . '</b> berhasil dibuat')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();
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
            Alert::error('Pemberitahuan', 'Data gagal dibuat : ' . $th->getMessage())->toToast()->toHtml();

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
            Alert::success('Pemberitahuan', 'Data <b>' . $jadwal->id . '</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : ' . $th->getMessage())->toToast()->toHtml();
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
            Alert::success('Pemberitahuan', 'Data <b>' . $jadwal->id . '</b> berhasil diupdate')->toToast()->toHtml();
        } catch (\Throwable $th) {
            DB::rollback();
            Alert::error('Pemberitahuan', 'Data gagal diupdate : ' . $th->getMessage())->toToast()->toHtml();
        }

        return redirect()->route('admin.jadwal.index');
    }

    public function destroy(Jadwal $jadwal)
    {
        //    throw new FailException("Data sudah di lock, tidak bisa dihapus");
        // }
        try {
            $jadwal->update([
                'status' => 'Cancel',
            ]);
            Alert::success('Pemberitahuan', 'Data <b>' . $jadwal->id . '</b> berhasil dibatalkan')->toToast()->toHtml();
        } catch (\Throwable $th) {
            Alert::error('Pemberitahuan', 'Data <b>' . $jadwal->id . '</b> gagal dibatalkan : ' . $th->getMessage())->toToast()->toHtml();
        }

        return back();
    }
}
