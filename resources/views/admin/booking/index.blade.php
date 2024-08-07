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
                                <h3 class="card-title">
                                    <div class="btn-group">
                                        @if (Auth::user()->role->name != 'fotografer')
                                            <a href="{{ route('admin.booking.create') }}" class="btn btn-sm btn-success"><i
                                                    class="fas fa-plus"></i> Tambah</a>
                                        @endif
                                        <a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-sync-alt"></i> Reload
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#filterBookingModal"
                                            class="btn btn-sm btn-info"><i class="fas fa-search"></i> Filter</a>
                                    </div>
                                </h3>
                            </div>

                            <div class="card-body table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Produk/Paket</th>
                                            <th>Jadwal</th>
                                            <th>Total Booking</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $row)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $row->pelanggan->nama ?? '' }}</td>
                                                <td>{{ $row->produk->nama_produk ?? '' }}</td>
                                                <td>{{ $row->jadwal ? \Carbon\Carbon::parse($row->jadwal->tgl_acara)->format('d M Y') : '' }}
                                                </td>
                                                <td>{{ $row->total_booking ? number_format($row->total_booking, 0, ',', '.') : '' }}
                                                </td>
                                                <td>{{ $row->total_bayar ? number_format($row->total_bayar, 0, ',', '.') : '' }}
                                                </td>
                                                <td>{{ $row->status_booking }}</td>
                                                <td>
                                                    <div class="justify-content-center g-3">
                                                        @if (Auth::user()->role->name == 'fotografer')
                                                            <a class="btn btn-info btn-sm m-1"
                                                                href="{{ Route('admin.booking.show', $row->id) }}">
                                                                Lihat</a>
                                                            <form id="destroy-booking"
                                                                action="{{ route('admin.booking.destroy', $row->id) }}"
                                                                method="POST">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm m-1">Batalkan</button>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @else
                                                            <a class="btn btn-info btn-sm m-1"
                                                                href="{{ Route('admin.booking.show', $row->id) }}">
                                                                Lihat</a>
                                                            <a class="btn btn-primary btn-sm m-1 {{ $row->bukti_booking == null ?: 'd-none' }}"
                                                                href="{{ Route('admin.booking.editDP', $row->id) }}">
                                                                Bayar DP</a>
                                                            <a class="btn btn-warning btn-sm m-1 {{ $row->bukti_bayar == null ?: 'd-none' }}"
                                                                href="{{ Route('admin.booking.edit', $row->id) }}">
                                                                Pelunasan</a>
                                                            <form id="destroy-booking"
                                                                action="{{ route('admin.booking.destroy', $row->id) }}"
                                                                method="POST">
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm m-1 {{ $row->bukti_booking == null || $row->bukti_bayar == null ?: 'd-none' }}">Batalkan</button>
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        @endif

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
