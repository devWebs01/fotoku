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
                         <form method="POST" action="{{ route('admin.produk.update', $data) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('patch') }}
                            <div class="card-body">
                                <x-form-input id='nama_produk' text='Nama Produk' required='required' value="{{$data->nama_produk}}" />
                                <x-form-input-rupiah id='harga' text='Harga' required='required' value="{{$data->harga}}"  />
                                <x-form-textarea id='info' text='Info' required='required' value="{{$data->info}}" />
                                <x-form-input-file id='gambar_1' text='Gambar 1' type='text' addClass='upload_gambar' />
                                <x-form-input-file id='gambar_2' text='Gambar 2' type='text' addClass='upload_gambar' />
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{ route('admin.produk.index') }}" class="btn btn-light">Kembali</a>
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
