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
                                                <td>{{ $index + 1 ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->tgl_acara ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->jam ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->deskripsi_acara ?? '-' }}</td>
                                                <td>{{ $booking->jadwal->status ?? '-' }}
                                                </td>
                                                <td>{{ $booking->fotografer->nama ?? '-' }}</td>
                                                <td>{{ $booking->created_at->format('d M Y H:i') ?? '-' }}</td>
                                                <td class="countdown"
                                                    data-cancellation-deadline="{{ $booking->cancellation_deadline->toIso8601String() }}">
                                                </td>



                                                <td>
                                                    @if (Auth::user()->role->name == 'fotografer')
                                                        <a class="btn btn-info btn-sm m-1"
                                                            href="{{ Route('admin.booking.show', $booking->id) }}">
                                                            Lihat</a>
                                                        <form id="destroy-booking"
                                                            action="{{ route('admin.booking.destroy', $booking->id) }}"
                                                            method="POST">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm m-1">Batalkan</button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @else
                                                        <a class="btn btn-info btn-sm m-1"
                                                            href="{{ Route('admin.booking.show', $booking->id) }}">
                                                            Lihat</a>
                                                        <a class="btn btn-primary btn-sm m-1 {{ $booking->bukti_booking == null ?: 'd-none' }}"
                                                            href="{{ Route('admin.booking.editDP', $booking->id) }}">
                                                            Bayar DP</a>
                                                        <a class="btn btn-warning btn-sm m-1 {{ $booking->bukti_bayar == null ?: 'd-none' }}"
                                                            href="{{ Route('admin.booking.edit', $booking->id) }}">
                                                            Pelunasan</a>
                                                        <form id="destroy-booking"
                                                            action="{{ route('admin.booking.destroy', $booking->id) }}"
                                                            method="POST">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm m-1 {{ $booking->bukti_booking == null || $booking->bukti_bayar == null ?: 'd-none' }}">Batalkan</button>
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
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
                    const cancellationDeadline = new Date(el.dataset.cancellationDeadline);
                    const now = new Date();
                    const diff = cancellationDeadline - now;

                    if (diff > 0) { // Check if there is remaining time
                        const seconds = Math.floor(diff / 1000);
                        const minutes = Math.floor(seconds / 60);
                        const hours = Math.floor(minutes / 60);
                        const days = Math.floor(hours / 24);

                        const secondsDisplay = seconds % 60;
                        const minutesDisplay = minutes % 60;
                        const hoursDisplay = hours % 24;

                        const formatted = days > 0 ?
                            `${days} hari, ${hoursDisplay} jam, ${minutesDisplay} menit, ${secondsDisplay} detik lagi` :
                            hours > 0 ?
                            `${hours} jam, ${minutesDisplay} menit, ${secondsDisplay} detik lagi` :
                            minutes > 0 ?
                            `${minutes} menit, ${secondsDisplay} detik lagi` :
                            `${secondsDisplay} detik lagi`;

                        el.textContent = formatted;
                    } else {
                        el.textContent = 'Waktu habis';
                        // Disable buttons and update status
                        const row = el.closest('tr');
                        row.querySelectorAll('.btn').forEach(btn => btn.classList.add('disabled'));
                        row.querySelectorAll('form').forEach(form => form.classList.add('d-none'));
                        row.querySelector(`#status-${row.dataset.bookingId}`).textContent = 'Dibatalkan';
                    }
                });
            }

            // Update countdown every second for real-time accuracy
            setInterval(updateCountdown, 1000);
            updateCountdown(); // Initial call
        });
    </script>
@endsection
