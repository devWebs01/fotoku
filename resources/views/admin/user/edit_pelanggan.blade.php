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
                         <form method="POST" action="{{ route('admin.pelanggan.update', $data->id) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('patch') }}
                            <div class="card-body">
                                <x-form-input id='nama' text='Nama' required='required' value="{{$data->nama}}" />
                                <x-form-number id='no_telp' text='No Telp' type='number' required='required' value="{{$data->no_telp}}" />
                                <x-form-textarea id='alamat' text='Alamat' required='required' value="{{$data->alamat}}" />
                                <x-form-input id='email' text='Email' required='required' value="{{$data->email}}" />
                                {{-- <x-form-input id='role' text='role' required='required' value="{{$data->role}}" /> --}}
                                <x-form-date id='tgl_lahir' text='Tanggal Lahir' addClass='dmy' required='required' value='{{ $data->tgl_lahir }}' />
                                <x-form-input-file id='foto_profile' text='Foto Profile' type='text' addClass='upload_gambar' />
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-light">Kembali</a>
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
