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
                            <div class="card-body table-responsive" style="background-color: #e7bff2;">
                                <div class="row">
                                    <div class="col-8">
                                        <h1>Selamat Datang</h1>
                                        <p style="padding:10px;">Selamat datang di eMarketplace Fotografer,platform
                                            yang menghubungkan fotografer profesional dengan pelanggan yang mencari karya
                                            fotografi berkualitas tinggi. Kami menyediakan akses mudah ke fotografer
                                            berbakat dalam berbagai genre, seperti pernikahan, potret keluarga, mode, dan
                                            lainnya. Dengan seleksi ketat dan portofolio mengesankan, kami memastikan
                                            kepuasan pelanggan. Dengan beberapa langkah sederhana, temukan fotografer yang
                                            sesuai dengan kebutuhan Anda. Kami juga memberikan alat manajemen bisnis dan
                                            pemasaran untuk membantu fotografer berkembang. Bergabunglah dengan kami
                                            sekarang dan ciptakan kenangan yang tak terlupakan melalui fotografi yang indah.
                                        </p>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ asset('./icon.png') }}" alt="" width="100%">
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
