@extends('layouts.admin') 
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
       
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>Profile Fotografer</h3>
                                        <table class="table table-hover">
                                            <tr>
                                                <th>Nama</th>
                                                <td>:</td>
                                                <td>{{ $user->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Spesialisasi</th>
                                                <td>:</td>
                                                <td>{{ Auth::user()->spesialisasi }}</td>
                                            </tr>
                                            <tr>
                                                <th>No Telp</th>
                                                <td>:</td>
                                                <td>{{ $user->no_telp }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>:</td>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>:</td>
                                                <td>{{ $user->alamat }}</td>
                                            </tr>
                                        </table>
                                        @if (!$bank->isEmpty())
                                            <h4>List Akun Bank</h4>
                                            <table class="table table-hover">
                                                @foreach ($bank as $item)
                                                    <tr>
                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>-</td>
                                                        <td>{{ $item->no_rek }} a.n ({{ $item->atas_nama }})</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if ($user->foto_profile)
                                            <img class="profile-user-img img-fluid img-circle" style="width: 300px;height: 300px; margin-left: 100px; margin-top: 50px;" src="{{ asset('/uploads/'.$user->foto_profile) }}" alt="User profile picture">
                                        @else
                                            <img class="profile-user-img img-fluid img-circle" style="width: 300px;height: 300px; margin-left: 100px; margin-top: 50px;" src="{{ asset('user-default.jpg') }}" alt="User profile picture">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @if (!$produk->isEmpty())
                            <h3>Paket Produk</h3>
                        @endif
                        <div class="row">
                            @foreach ($produk as $item)
                                <div class="col-4">
                                    <div class="small-box bg-success" style="padding: 10px;">
                                        <div class="inner" style="display: flex; gap: 20px;">
                                            <div class="content">
                                                <h3>Rp. {{ $item->harga }}</h3>
                                                <p>Info:</p> 
                                                <p>{{ $item->info }}</p>
                                            </div>
                                            <div class="foto" style="margin-left: 50px;">
                                                <a href="{{ asset('uploads/'.$item->gambar_1) }}" data-toggle="lightbox" data-title="{{ $item->nama_produk }}">
                                                    <img src="{{ asset('uploads/'.$item->gambar_1) }}" class="img-fluid mb-2" alt="white sample" width="200px;">
                                                </a>
                                                <a href="{{ asset('uploads/'.$item->gambar_2) }}" data-toggle="lightbox" data-title="{{ $item->nama_produk }}">
                                                    <img src="{{ asset('uploads/'.$item->gambar_2) }}" class="img-fluid mb-2" alt="white sample" width="200px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
            </div><!-- /.container-fluid -->
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Galeri Foto</h4>
                </div>
                <div class="card-body">
                        <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 337px;">
                            @foreach ($galeri as $item)
                                <div class="filtr-item col-sm-3" data-category="1" data-sort="{{ $item->judul }}" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 270.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                    <a href="{{ asset('uploads/'.$item->name) }}" data-toggle="lightbox" data-title="{{ $item->judul }}" data-footer="{{ $item->deskripsi }}">
                                        <img src="{{ asset('uploads/'.$item->name) }}" class="img-fluid mb-2" alt="white sample">
                                    </a>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection