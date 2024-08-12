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
                                        <a href="{{ route('admin.jadwal.index') }}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-sync-alt"></i> Reload</a>
                                    </div>
                                </h3>
                            </div>

                            <div class="card-body ">
                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Acara</th>
                                                <th>Jam</th>
                                                <th>Deskripsi Acara</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($jadwals as $index => $jadwal)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $jadwal->tgl_acara }}</td>
                                                    <td>{{ $jadwal->jam }}</td>
                                                    <td>{{ $jadwal->deskripsi_acara }}</td>
                                                    <td>
                                                        @foreach ($jadwal->bookings as $booking)
                                                            {{ $booking->pelanggan->nama ?? 'Nama tidak ditemukan' }}
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @if (Auth::user()->role->name == 'fotografer')
                                                            <a href="{{ route('admin.jadwal.show', $jadwal->id) }}"
                                                                class="btn btn-info btn-sm">Lihat</a>
                                                        @else
                                                            <a href="{{ route('admin.jadwal.show', $jadwal->id) }}"
                                                                class="btn btn-info btn-sm">Lihat</a>
                                                        @endif
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
            </div>
        </section>
    </div>
@endsection
{{-- @push('scripts')
    @include('admin.jadwal.script', ['id' => 'Jadwal'])
@endpush --}}
