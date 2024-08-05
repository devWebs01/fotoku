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
                                    @if (Auth::user()->role_id == 2)
                                        <a href="{{ route("admin.produk.create") }}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Tambah</a>
                                        <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i> Reload</a>
                                    @endif
                                </div>
                            </h3>
                        </div>
                       
                        <div class="card-body table-responsive">
                           <x-table :th="['No', 'Nama Produk','Harga','Info','Gambar 1','Gambar 2', 'Aksi']" id="Produk" />
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('scripts')
    @include('admin.produk.script', ['id' => 'Produk'])
@endpush
