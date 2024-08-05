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
                            <a class="btn btn-default" href="{{ route('admin.user.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>

                        <div class="card-body">
                            <center>
                                @if ($data->foto_profile)
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('/uploads/'.$item->foto_profile) }}" alt="User profile picture" style="width: 200px!important;">
                                @else
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('user-default.jpg') }}" style="width: 200px!important;" alt="User profile picture">
                                @endif
                            </center>
                            <br>
                            <div class="form-group">
                                <x-table-show :thtd="['Nama' => $data->nama,'No Telp' => $data->no_telp,'alamat' => $data->alamat,'email' => $data->email,'password' => $data->password, 'tgl_lahir' => $data->tgl_lahir, 'Tanggal Input' => $data->created_at, 'Tanggal Update' => $data->updated_at ]" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
