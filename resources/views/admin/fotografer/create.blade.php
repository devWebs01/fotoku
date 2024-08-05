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
                        <form method="POST" action="{{ route('admin.fotografer.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <x-form-input id='nama' text='nama' required='required' />
<x-form-number id='no_telp' text='no_telp' type='number' required='required' />
<x-form-textarea id='alamat' text='alamat' required='required' />
<x-form-input id='email' text='email' required='required' type="email" />
<x-form-select2-option id='kecamatan_id' text='kecamatan' kolom='nama_kecamatan' :array='$select' required='required' />
{{-- <x-form-select2 id='kecamatan_id' text='kecamatan_id'  > </x-form-select2> --}}

                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Simpan" class="btn btn-success">
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

