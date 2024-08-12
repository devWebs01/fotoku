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
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Acara</th>
                                            <th>Jam</th>
                                            <th>Deskripsi Acara</th>
                                            <th>Status</th>
                                            <th>Fotografer</th>
                                            <th>Waktu Dibuat</th>
                                            <th>Hitung Mundur</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $index => $booking)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $booking->jadwal->tgl_acara }}</td>
                                                <td>{{ $booking->jadwal->jam }}</td>
                                                <td>{{ $booking->jadwal->deskripsi_acara }}</td>
                                                <td id="status-{{ $booking->id }}">{{ $booking->status_booking }}</td>
                                                <td>{{ optional($booking->fotografer)->nama }}</td>
                                                <td>{{ $booking->created_at->format('d M Y H:i') }}</td>
                                                <td class="countdown"
                                                    data-created-at="{{ $booking->created_at->toIso8601String() }}"></td>
                                                <td>
                                                    @if (Auth::user()->role->name == 'fotografer')
                                                        <a href="{{ route('admin.jadwal.show', $booking->jadwal_id) }}"
                                                            class="btn btn-info btn-sm">Lihat</a>
                                                        <a href="{{ route('admin.jadwal.edit', $booking->jadwal_id) }}"
                                                            class="btn btn-warning btn-sm">Edit</a>
                                                        <a href="{{ route('admin.jadwal.editStatus', $booking->jadwal_id) }}"
                                                            class="btn btn-primary btn-sm">Selesaikan</a>
                                                        <form
                                                            action="{{ route('admin.jadwal.destroy', $booking->jadwal_id) }}"
                                                            method="POST" style="display: inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm">Batalkan</button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('admin.jadwal.show', $booking->jadwal_id) }}"
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
        </section>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function updateCountdown() {
                const elements = document.querySelectorAll('.countdown');
                elements.forEach(el => {
                    const createdAt = new Date(el.dataset.createdAt);
                    const now = new Date();
                    const diff = now - createdAt;
                    const minutes = Math.floor(diff / 60000);
                    const hours = Math.floor(minutes / 60);
                    const days = Math.floor(hours / 24);
                    const formatted = days > 0 ?
                        `${days} days ago` :
                        hours > 0 ?
                        `${hours} hours ago` :
                        minutes > 0 ?
                        `${minutes} minutes ago` :
                        'just now';
                    el.textContent = formatted;
                });
            }

            // Update countdown every minute
            setInterval(updateCountdown, 60000);
            updateCountdown(); // Initial call
        });
    </script>
@endsection
