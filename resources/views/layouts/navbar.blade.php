<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" id="btntheme" role="button">
                <i id="icontheme" class="fas fa-sun"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}" role="button">
                <i class="fas fa-globe"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->foto_profile)
                    <img src="{{ Storage::url(Auth::user()->foto_profile) }}" class="user-image img-circle"
                        style="background-color: white;" alt="User Image">
                @else
                    <img src="{{ asset('user-default.jpg') }}" class="user-image img-circle elevation-2"
                        alt="User Image">
                @endif
                <span class="d-none d-md-inline">{{ Auth::user()->nama }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal">
                        <i class="fas fa-unlock nav-icon"></i>
                        Ganti Password
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modal-logout"
                        data-backdrop="static" data-keyboard="false">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
