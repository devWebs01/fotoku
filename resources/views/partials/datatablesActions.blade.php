{{-- @isset($detailAngsuran)
    <a class="btn btn-xs btn-secondary" href="{{ url('admin/' . $crudRoutePart . '/list/'.$registrasi_tempat->id) }}" data-id="{{$registrasi_tempat->id}}" data-nama="{{$nama}}">Detail Angsuran</a>
@endif
@isset($detailTunggakan)
    <a class="btn btn-xs btn-secondary" href="{{ url('admin/' . $crudRoutePart . '/list/'.$registrasi_tempat->id) }}" data-id="{{$registrasi_tempat->id}}" data-nama="{{$nama}}">Detail Tunggakan</a>
@endif
@isset($bayarAngsuran)
    <form action="{{ route('admin.angsurans.create_param', $registrasi_tempat->id) }}" id="angsuranSubmit{{$registrasi_tempat->id}}" style="display: inline-block;" >
        <a class="btn btn-xs btn-info btnAngsuran" href="#" data-id="{{$registrasi_tempat->id}}" data-nama="{{$nama}}">
        Bayar Angsuran
        </a>
    </form>
@endif
@isset($printSKRD)
    <form action="{{ route('admin.' . $crudRoutePart . '.print_skrd', $row->id) }}" id="printSubmit{{$row->id}}" style="display: inline-block;" >
        <a class="btn btn-xs btn-secondary btnPrint" href="#" data-id="{{$row->id}}" data-nama="{{$nama}}">
        Download SKRD
        </a>
    </form>
@endif
@isset($nonAktif)
    <form action="{{ route('admin.' . $crudRoutePart . '.non_aktif') }}" method="POST" id="nonAktifSubmit{{$row->id}}" style="display: inline-block;" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{$row->id}}">
        <a href="#" class="btn btn-xs btn-warning btnNonAktif" data-id="{{$row->id}}" data-nama="{{$nama}}">Non Aktif</a>
    </form>
    <br>
@endif
@isset($confirmGate)
    @can($confirmGate)
        <form action="{{ route('admin.' . $crudRoutePart . '.konfirm', $row->id) }}" method="POST" id="konfirmSubmit{{$row->id}}" style="display: inline-block;" >
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{$row->id}}">
            <a href="#" class="btn btn-xs btn-warning btnKonfirm" data-id="{{$row->id}}" data-nama="{{$nama}}">Terima</a>
        </form>
    @endcan
@endif --}}
<div class="btn-group-vertical">
    <div class="btn-group dropleft">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  >
            <i class="fas fa-tasks"></i>
        </button>
        <div class="dropdown-menu" >
            @isset($createJawaban)
                    <a class="dropdown-item" href="{{ url('admin/jawaban_indikator/create?indeks='.$row->variable->indeks_id.'&variable='.$row->variable_id) }}">
                        <i class="fas fa-plus"></i> &nbsp;&nbsp;Jawaban Indikator
                    </a>
            @endif
            @isset($pengaturanGate)
                    <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.pengaturan', $row->id ) }}">
                        <i class="fas fa-cog"></i> &nbsp;&nbsp;Pengaturan Indeks
                    </a>
            @endif
            @isset($viewGate)
                    <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id ) }}">
                        <i class="fas fa-bars mr-2"></i> Detail
                    </a>
            @endif
            @isset($editGate)
                    <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.edit',  $row->id) }}">
                        <i class="fas fa-pencil-alt mr-2"></i> Edit
                    </a>
            @endif
            @isset($jadwalGate)
                    <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.editStatus',  $row->id) }}">
                        <i class="fas fa-pencil-alt mr-2"></i> Selesaikan
                    </a>
            @endif
            @isset($dpGate)
                    <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.editDP',  $row->id) }}">
                        <i class="fas fa-pencil-alt mr-2"></i> Bayar DP
                    </a>
            @endif
            @isset($lunasGate)
                    <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.edit',  $row->id) }}">
                        <i class="fas fa-pencil-alt mr-2"></i> Pelunasan
                    </a>
            @endif
            @isset($editGateSimple)
                    <a href="#" class="dropdown-item btn-edit" data-id="{{ $row->id }}"><i class="fas fa-pencil-alt mr-2"></i> Edit </a>
            @endif
            @isset($deleteGate)
                    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" id="deleteSubmit{{$row->id}}" >
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="#" class="dropdown-item btnDelete" id="hapus" data-id="{{$row->id}}" data-nama="{{$nama}}"><i class="fas fa-trash danger mr-2"> </i> Hapus</a>
                    </form>
            @endif
            @isset($batalGate)
                    <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" id="deleteSubmit{{$row->id}}" >
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="#" class="dropdown-item btnDelete" id="hapus" data-id="{{$row->id}}" data-nama="{{$nama}}"><i class="fas fa-trash danger mr-2"> </i> Batalkan</a>
                    </form>
            @endif
        </div>
    </div>
</div>    
    
