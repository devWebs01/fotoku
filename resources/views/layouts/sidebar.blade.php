<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/home') }}" class="brand-link">
   
    <span class="brand-text font-weight-light">{{ Setting::getValue('app_short_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                {{-- menu admin --}}
                @if (Auth::user()->role->name == 'admin')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active':'' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.setting.index') }}" class="nav-link {{ request()->routeIs('admin.setting.index') ? 'active':'' }}">
                            <i class="fas fa-cog nav-icon"></i>
                            <p>Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.role.index') }}" class="nav-link {{ request()->routeIs('admin.role.index') ? 'active':'' }}">
                            <i class="fas fa-user-cog nav-icon"></i>
                            <p>Role</p>
                        </a>
                    </li>
                    {{-- <li class="nav-header"></li> --}}
                    <li class="nav-item has-treeview 
                    {{ request()->is('admin/pelanggan*') ? 'menu-open' : '' }} 
                    {{ request()->is('admin/fotografer*') ? 'menu-open' : '' }} 
                    {{ request()->is('admin/kecamatan*') ? 'menu-open' : '' }} 
                    ">
                        <a href="#" class="nav-link 
                            {{ request()->is('admin/pelanggan*') ? 'active':'' }}
                            {{ request()->is('admin/fotografer*') ? 'active':'' }}
                            {{ request()->is('admin/kecamatan*') ? 'active':'' }}
                        ">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                            DATA MASTER
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item child-sidebar">
                                <a href="{{ route('admin.pelanggan.index') }}" class="nav-link {{ request()->is('admin/pelanggan*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                                </a>
                            </li>
                            <li class="nav-item child-sidebar">
                                <a href="{{ route('admin.fotografer.index') }}" class="nav-link {{ request()->is('admin/fotografer*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fotografer</p>
                                </a>
                            </li>
                            <li class="nav-item child-sidebar">
                                <a href="{{ route('admin.kecamatan.index') }}" class="nav-link {{ request()->is('admin/kecamatan*') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kecamatan / Daerah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.produk.index') }}" class="nav-link {{ request()->is('admin/produk*') ? 'active':'' }}">
                            <i class="fas fa-camera-retro nav-icon"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}" class="nav-link {{ request()->is('admin/booking*') ? 'active':'' }}">
                            <i class="fas fa-receipt nav-icon"></i>
                            <p>Booking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jadwal.index') }}" class="nav-link {{ request()->is('admin/jadwal*') ? 'active':'' }}">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Jadwal Acara</p>
                        </a>
                    </li>
                @endif

                {{-- menu fotografer --}}
                {{-- @if (Auth::user()->role->name == 'fotografer') --}}
                @if (Auth::user()->role->name == 'fotografer')
                    <li class="nav-item">
                        <a href="{{ route('admin.fotografer.edit', Auth::user()->id) }}" class="nav-link {{ request()->is('admin/fotografer*') ? 'active':'' }}">
                            <i class="fas fa-cog nav-icon"></i>
                            <p>Edit Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bank.index') }}" class="nav-link {{ request()->is('admin/bank*') ? 'active':'' }}">
                            <i class="fas fa-university nav-icon"></i>
                            <p>Bank</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galeri.index') }}" class="nav-link {{ request()->is('admin/galeri*') ? 'active':'' }}">
                            <i class="fas fa-images nav-icon"></i>
                            <p>Galeri Foto</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.produk.index') }}" class="nav-link {{ request()->is('admin/produk*') ? 'active':'' }}">
                            <i class="fas fa-camera-retro nav-icon"></i>
                            <p>Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}" class="nav-link {{ request()->is('admin/booking*') ? 'active':'' }}">
                            <i class="fas fa-receipt nav-icon"></i>
                            <p>Booking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jadwal.index') }}" class="nav-link {{ request()->is('admin/jadwal*') ? 'active':'' }}">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Data Jadwal</p>
                        </a>
                    </li>
                @endif
                {{-- menu pelanggan --}}
                @if (Auth::user()->role->name == 'pelanggan')
                    <li class="nav-item">
                        <a href="{{ route('admin.pelanggan.edit', Auth::user()->id) }}" class="nav-link {{ request()->is('admin/pelanggan*') ? 'active':'' }}">
                            <i class="fas fa-cog nav-icon"></i>
                            <p>Profile</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.booking.index') }}" class="nav-link {{ request()->is('admin/booking*') ? 'active':'' }}">
                            <i class="fas fa-receipt nav-icon"></i>
                            <p>Booking</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.jadwal.index') }}" class="nav-link {{ request()->is('admin/jadwal*') ? 'active':'' }}">
                            <i class="fas fa-calendar-check nav-icon"></i>
                            <p>Jadwal Acara</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>