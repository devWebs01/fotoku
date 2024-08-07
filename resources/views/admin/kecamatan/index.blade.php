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
                        @can('create kecamatan')
                        <div class="card-header">
                            <h3 class="card-title">
                                <div class="btn-group">
                                @can('create kecamatan')
                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i> Tambah</a>
                                @endcan
                                    <a href="{{ route('admin.kecamatan.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Reload</a>
                                </div>
                            </h3>
                        </div>
                        @endcan
                       
                        <div class="card-body table-responsive">
                           <x-table :th="['No', 'Nama Kecamatan','Keterangan', 'Aksi']" id="Kecamatan" />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
    @include('admin.kecamatan.script', ['id' => 'Kecamatan'])
@endpush

@section('modal')
    {{-- Modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-tambah" action="{{ route('admin.kecamatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form-input id='nama_kecamatan' text='Nama Kecamatan' required='required' />
                        <x-form-textarea id='keterangan' text='Keterangan' />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn-action">Simpan</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Modal Update --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <x-form-input id='nama_kecamatan' text='Nama Kecamatan' required='required' />
                        <x-form-textarea id='keterangan' text='Keterangan' />

                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btn-action">Update</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
