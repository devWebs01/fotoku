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
                         <form method="POST" action="{{ route('admin.galeri.update', $data) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('patch') }}
                            <div class="card-body">
                                {{-- <x-form-input id='name' text='name' required='required' value="{{$data->name}}" /> --}}
                                <x-form-input-file id='file' text='File'  type='text' addClass='upload_gambar' />
                                <x-form-input id='judul' text='Judul' required='required' value="{{$data->judul}}" />
                                <x-form-textarea id='deskripsi' text='Deskripsi' required='required'>{{ $data->deskripsi }}</x-form-textarea>

                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{ route('admin.galeri.index') }}" class="btn btn-light">Kembali</a>
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
