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
                         <form method="POST" action="{{ route('admin.booking.updateDP') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }} 
                            <div class="card-body">
                                <input type="hidden" value="{{ $data->id }}" id="booking_id" name="booking_id">
                                <x-form-input id='produk_id' text='Produk/Paket' required='required' value="{{$data->produk->nama_produk}} ( Rp.{{$data->produk->harga }})" readonly='readonly' />
                                <x-form-input id='jadwal_id' text='Jadwal' required='required' value="{{$data->jadwal->tgl_acara}}" readonly='readonly' /> 
                                <x-form-input-rupiah id='total_booking' text='Total Booking' required='required' value="{{ $data->produk->harga / 2 }}" keterangan='** total bukti booking harus min 50% dari harga paket'  />
                                <x-form-input-file id='bukti_booking' text='Bukti Booking' required='required'  type='text' addClass='upload_gambar' keterangan='** Bukti Booking harus berupa jpeg' />
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-light">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
@endpush
