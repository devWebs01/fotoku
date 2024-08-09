<x-auth-layout>
    <div class="login-box w-100">

        <!-- Password Reset 8 - Bootstrap Brain Component -->
        <section class="p-3 p-md-4 p-xl-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xxl-11">
                        <div class="card border-light-subtle shadow-sm">
                            <div class="row g-0">
                                <div class="col-12 col-md-6">
                                    <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
                                        src="https://i.pinimg.com/564x/42/d5/bf/42d5bf7d7a0e5fbb23a461e5445d0ab5.jpg"
                                        alt="Welcome back you've been missed!">
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                                    <div class="col-12 col-lg-11 col-xl-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-5">
                                                    <div class="text-center">
                                                        <a href="/">
                                                            <img src="{{ asset('icon.png') }}" alt=""
                                                                class="w-25">
                                                        </a>
                                                        <h2 class="h4">Password Reset</h2>
                                                        <small
                                                            class="fs-6 font-weight-bold text-secondary text-center m-0">Berikan
                                                            alamat email yang terkait dengan akun kamu untuk memulihkan
                                                            kata
                                                            sandi kamu.
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            @if (session('status'))
                                                <div class="alert alert-primary" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif

                                            <form method="POST" action="{{ route('password.email') }}">
                                                @csrf

                                                <div class="mb-3">

                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus>

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary btn-block">
                                                        Kirim Email Reset Password
                                                    </button>

                                                    <div class="row mt-3">
                                                        <a href="/#register" class="col-6 font-weight-bold">Buat
                                                            Akun!</a>
                                                        <a href="{{ route('login') }}"
                                                            class="col-6 font-weight-bold text-right">Login!</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.login-logo -->

        <!-- /.card -->
    </div>
</x-auth-layout>
