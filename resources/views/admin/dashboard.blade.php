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
                {{-- <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ count($user) }}</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ count($role) }}</h3>
                            <p>Role</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <a href="{{ route('admin.role.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ count($permission) }}</h3>

                            <p>Permission</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-unlock"></i>
                        </div>
                        <a href="{{ route('admin.permission.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div> --}}
                <div class="row">
                    <div class="col-12">
                        <h5>
                            <i>
                                Penilaian Sedang Berlangsung...
                            </i>
                        </h5>
                        <div class="card">
                            {{-- @can('create indikator') --}}
                            <div class="card-header">
                                <h3 class="card-title">
                                    JUDUL URAIAN PENILAIAN INDEKS
                                </h3>
                                <span class="float-right">
                                    status:
                                </span>
                            </div>
                            {{-- @endcan --}}
                           
                            <div class="card-body table-responsive">
                                <div class="row mr-1">
                                    <div class="col-4">
                                        <div class="isi">
                                            Tahun :
                                            <br>
                                            Tanggal Mulai:
                                        </div>
                                        <div class="link mt-4">
                                            <button class="btn btn-primary">Mulai Input</button>
                                        </div>
                                    </div>
                                    <div class="col-8 float-right">
                                        <div class="row">
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>{{ count($user) }}</h3>
                                                    <p>Jumlah Tatanan</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <a href="{{ route('admin.user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>{{ count($role) }}</h3>
                                                    <p>Jumlah Indikator</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-cog"></i>
                                                </div>
                                                <a href="{{ route('admin.role.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>{{ count($permission) }}</h3>
                        
                                                    <p>Persentase Tatanan</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-unlock"></i>
                                                </div>
                                                <a href="{{ route('admin.permission.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
                {{-- UI validator --}}
                <div class="row">
                    <div class="col-12">
                        <h5>
                            <i>
                                Penilaian Sedang Berlangsung...
                            </i>
                        </h5>
                        <div class="card">
                            {{-- @can('create indikator') --}}
                            <div class="card-header">
                                <h3 class="card-title">
                                    JUDUL URAIAN PENILAIAN INDEKS
                                </h3>
                            </div>
                            {{-- @endcan --}}
                           
                            <div class="card-body table-responsive">
                                <div class="row mt-1">
                                    <div class="col-4">
                                        <div class="isi">
                                            Tahun :
                                            <br>
                                            Tanggal Mulai:
                                            <br>
                                            Status :
                                        </div>
                                    </div>
                                    <div class="col-8 float-right">
                                        <div class="row">
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-info">
                                                    <div class="inner">
                                                        <h3>{{ count($user) }}</h3>
                                                        <p>Jumlah Tatanan</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-success">
                                                    <div class="inner">
                                                        <h3>{{ count($role) }}</h3>
                                                        <p>Jumlah Indikator</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-user-cog"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-4 col-6">
                                                <!-- small box -->
                                                <div class="small-box bg-warning">
                                                    <div class="inner">
                                                        <h3>{{ count($permission) }}</h3>
                                                        <p>Persentase Tatanan</p>
                                                    </div>
                                                    <div class="icon">
                                                        <i class="fas fa-unlock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ./col -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-12">
                                        <table class="table table-bordered table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tatanan</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th>Total Item Input</th>
                                                    <th>Persentase Nilai</th>
                                                    <th>Keterangan</th>
                                                    {{-- @canany(['update user', 'delete user']) --}}
                                                        <th>Aksi</th>
                                                    {{-- @endcanany --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tatatan asdada</td>
                                                    <td> </td>
                                                    <td> </td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td> </td>
                                                {{-- @canany(['update user', 'delete user']) --}}
                                                        <td>
                                                            
                                                            <div class="btn-group">
                                                                <button class="btn btn-sm btn-success btn-edit" ><i class="fas fa-share"></i> PROSES</button>
                                                            </div>
                                                        </td>
                                                    {{-- @endcanany --}}
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection