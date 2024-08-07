@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-default" href="{{ route('admin.booking.index') }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <x-table-show :thtd="[
                                        'Nama Pelanggan' => $data->pelanggan->nama,
                                        'Fotografer' => $data->produk->fotografer->nama,
                                        'Produk/Paket' => $data->produk->nama_produk,
                                        'Jadwal' => $data->jadwal->tgl_acara,
                                        'Total Booking' => $data->total_booking,
                                        'Total Sisa Bayar' => $data->total_bayar,
                                        'status' => $data->status_booking,
                                        'Tanggal Input' => $data->created_at,
                                        'Tanggal Update' => $data->updated_at,
                                    ]" />
                                </div>

                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="row">
                                            @if ($data->bukti_booking)
                                                <div class="col-md border p-3">
                                                    <p class="font-weight-bold display-4">Bukti Booking</p>
                                                    <img src="{{ Storage::url($data->bukti_booking) }}" width="700"
                                                        height="700" style="object-fit: cover;" alt="">
                                                </div>
                                            @endif
                                            @if ($data->bukti_bayar)
                                                <div class="col-md border p-3">
                                                    <p class="font-weight-bold display-4">Bukti Pelunasan</p>
                                                    <img src="{{ Storage::url($data->bukti_bayar) }}" width="700"
                                                        height="700" style="object-fit: cover;" alt="">
                                                </div>
                                            @endif
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
