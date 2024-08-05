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
                         <form method="POST" action="{{ route('admin.jadwal.update', $data) }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }} {{ method_field('patch') }}
                            <div class="card-body">
                                <x-form-date id='tgl_acara' text='Tanggal Acara' addClass='dmy' required='required' />
                                <x-form-date id='jam' text='Jam' addClass='jam' required='required' />

                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Update" class="btn btn-success">
                                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-light">Kembali</a>
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
