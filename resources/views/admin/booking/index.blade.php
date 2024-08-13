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
                                            <a href="{{ route('admin.booking.create') }}" class="btn btn-sm btn-success">
                                                <i class="fas fa-plus"></i> Tambah
                                            </a>
                                        @endif
                                        <a href="{{ route('admin.booking.index') }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-sync-alt"></i> Reload
                                        </a>
                                        <a href="#" data-toggle="modal" data-target="#filterBookingModal"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-search"></i> Filter
                                        </a>
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
                                                <td>{{ $booking->jadwal->tgl_acara ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->jam ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->deskripsi_acara ?? '-' }}</td>
                                                <td>{{ $booking->status_booking ?? '-' }}</td>
                                                <td>{{ $booking->fotografer->nama ?? '-' }}</td>
                                                <td>{{ $booking->created_at->format('d M Y H:i') ?? '-' }}</td>
                                                <td class="countdown"
                                                    data-cancellation-deadline="{{ $booking->cancellation_deadline->toIso8601String() }}">
                                                </td>
                                                <td>
                                                <td>
                                                    @if (Auth::user()->role->name == 'fotografer')
                                                        <a class="btn btn-info btn-sm m-1"
                                                            href="{{ route('admin.booking.show', $booking->id) }}">Lihat</a>
                                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm m-1">Batalkan</button>
                                                        </form>
                                                    @elseif(Auth::user()->role->name == 'admin')
                                                        <a class="btn btn-info btn-sm m-1"
                                                            href="{{ route('admin.booking.show', $booking->id) }}">Lihat</a>
                                                    @else
                                                        <a class="btn btn-info btn-sm m-1"
                                                            href="{{ route('admin.booking.show', $booking->id) }}">Lihat</a>

                                                        @if ($booking->jadwal->status != 'Cancel')
                                                            <a class="btn btn-primary btn-sm m-1 {{ $booking->bukti_booking == null ? '' : 'd-none' }}"
                                                                href="{{ route('admin.booking.editDP', $booking->id) }}">Bayar
                                                                DP</a>
                                                            <a class="btn btn-warning btn-sm m-1 {{ $booking->bukti_bayar == null ? '' : 'd-none' }}"
                                                                href="{{ route('admin.booking.edit', $booking->id) }}">Pelunasan</a>
                                                            <form
                                                                action="{{ route('admin.booking.destroy', $booking->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm m-1 {{ $booking->bukti_booking == null && Auth()->user()->role_id == 3 ? '' : 'd-none' }}">Batalkan</button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                </td>

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
                    const row = el.closest('tr');
                    const status = row.querySelector('td:nth-child(5)').textContent.trim().toLowerCase();

                    if (status !== 'booking') {
                        el.textContent = '-';
                        return;
                    }

                    const cancellationDeadline = new Date(el.dataset.cancellationDeadline);
                    const now = new Date();
                    const diff = cancellationDeadline - now;

                    if (diff > 0) {
                        const seconds = Math.floor(diff / 1000);
                        const minutes = Math.floor(seconds / 60);
                        const hours = Math.floor(minutes / 60);
                        const days = Math.floor(hours / 24);

                        const formatted = days > 0 ?
                            `${days} hari, ${hours % 24} jam, ${minutes % 60} menit, ${seconds % 60} detik lagi` :
                            hours > 0 ?
                            `${hours} jam, ${minutes % 60} menit, ${seconds % 60} detik lagi` :
                            minutes > 0 ?
                            `${minutes} menit, ${seconds % 60} detik lagi` :
                            `${seconds % 60} detik lagi`;

                        el.textContent = formatted;
                    } else {
                        el.textContent = 'Waktu habis';

                        const buttons = row.querySelectorAll('.btn');
                        buttons.forEach(btn => btn.classList.add('disabled'));
                        row.querySelector('td:nth-child(5)').textContent = 'Dibatalkan';
                    }
                });
            }

            setInterval(updateCountdown, 1000);
            updateCountdown();
        });
    </script>
@endsection
