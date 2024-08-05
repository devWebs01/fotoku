<aside class="main-sidebar sidebar-my-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">
            <!-- <img src="{{asset('img/asset/logo_sipapa.png')}}" width="25px" alt="Logo" srcset=""> -->
            <b>&nbsp;:::  &nbsp; Retribusi Pasar App</b> 
        </span>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">
                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.managementPengguna.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item child-sidebar">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/pasars*') ? 'menu-open' : '' }} {{ request()->is('admin/jenis_bangunans*') ? 'menu-open' : '' }} {{ request()->is('admin/golongans*') ? 'menu-open' : '' }} {{ request()->is('admin/retkeb*') ? 'menu-open' : '' }} {{ request()->is('admin/retpela*') ? 'menu-open' : '' }} {{ request()->is('admin/kelompok_retribusis*') ? 'menu-open' : '' }} {{ request()->is('admin/assets*') ? 'menu-open' : '' }} {{ request()->is('admin/tb_master*') ? 'menu-open' : '' }} ">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>Data Master</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item child-sidebar">
                                <a href="{{route("admin.pasars.index")}}" class="nav-link {{ request()->is('admin/pasars') || request()->is('admin/pasars/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            Pasar
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.jenis_bangunans.index")}}" class="nav-link {{ request()->is('admin/jenis_bangunans') || request()->is('admin/jenis_bangunans/*') ? 'active' : '' }}">
                                        <i class="far fa-building">

                                        </i>
                                        <p>
                                            Jenis Bangunan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.golongans.index")}}" class="nav-link {{ request()->is('admin/golongans') || request()->is('admin/golongans/*') ? 'active' : '' }}">
                                        <i class="fas fa-medal">

                                        </i>
                                        <p>
                                            Golongan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.retkeb.index")}}" class="nav-link {{ request()->is('admin/retkeb') || request()->is('admin/retkeb/*') ? 'active' : '' }}">
                                        <i class="fas fa-money-check-alt">

                                        </i>
                                        <p>
                                            Retribusi Kebersihan
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.retpela.index")}}" class="nav-link {{ request()->is('admin/retpela') || request()->is('admin/retpela/*') ? 'active' : '' }}">
                                        <i class="fas fa-money-check">

                                        </i>
                                        <p>
                                            Retribusi Pelataran
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.kelompok_retribusis.index")}}" class="nav-link {{ request()->is('admin/kelompok_retribusis') || request()->is('admin/kelompok_retribusis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-users">

                                        </i>
                                        <p>
                                            Kelompok Retribusi
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.assets.index")}}" class="nav-link {{ request()->is('admin/assets') || request()->is('admin/assets/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-boxes">

                                        </i>
                                        <p>
                                            Asset
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.tb_master.index")}}" class="nav-link {{ request()->is('admin/tb_master') || request()->is('admin/tb_master/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-calendar-alt">

                                        </i>
                                        <p>
                                            Tutup Buku Master
                                        </p>
                                    </a>
                                </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('admin/pedagangs*') ? 'menu-open' : '' }} {{ request()->is('admin/registrasi_tempats*') ? 'menu-open' : '' }} {{ request()->is('admin/pembaharuan_izin*') ? 'menu-open' : '' }} ">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>Pedagang</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.pedagangs.index")}}" class="nav-link {{ request()->is('admin/pedagangs') || request()->is('admin/pedagangs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>Data Pedagang</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.registrasi_tempats.index")}}" class="nav-link {{ request()->is('admin/registrasi_tempats') || request()->is('admin/registrasi_tempats/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-boxes">

                                        </i>
                                        <p>
                                            <span>Registrasi Tempat</span>
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item child-sidebar">
                                    <a href="{{route("admin.pembaharuan_izin.index")}}" class="nav-link {{ request()->is('admin/pembaharuan_izin') || request()->is('admin/pembaharuan_izin/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-book">

                                        </i>
                                        <p>
                                            <span>Pembaharuan Izin</span>
                                        </p>
                                    </a>
                                </li>
                            
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("admin.setorans.index")}}" class="nav-link {{ request()->is('admin/setorans') || request()->is('admin/setorans/*') ? 'active' : '' }}">
                            <i class="fas fa-money-check">

                            </i>
                            <p>
                                <span>Setoran</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("admin.group_tunggakans.index")}}" class="nav-link {{ request()->is('admin/group_tunggakans') || request()->is('admin/tunggakans/*') ? 'active' : '' }}">
                            <i class="fas fa-wallet">

                            </i>
                            <p>
                                <span>Tunggakan & Ket.</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("admin.group_angsurans.index")}}" class="nav-link {{ request()->is('admin/angsurans') || request()->is('admin/angsurans/*') || request()->is('admin/group_angsurans') ? 'active' : '' }}">
                            <i class="fas fa-coins">

                            </i>
                            <p>
                                <span>Angsuran</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route("admin.tutup_buku.index")}}" class="nav-link {{ request()->is('admin/tutup_buku') || request()->is('admin/tutup_buku/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-calendar-alt">

                            </i>
                            <p>
                                <span>Tutup Buku</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.events.index") }}" class="nav-link {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-calendar-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.event.title') }}</span>
                            </p>
                        </a>
                    </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>