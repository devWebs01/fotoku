<div class="btn-group-vertical">
    <div class="btn-group dropleft">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
            <i class="fas fa-tasks"></i>
        </button>
        <div class="dropdown-menu">
            @isset($createJawaban)
                <a class="dropdown-item" href="{{ url('admin/jawaban_indikator/create?indeks=' . $row->variable->indeks_id . '&variable=' . $row->variable_id) }}">
                    <i class="fas fa-plus"></i> &nbsp;&nbsp;Jawaban Indikator
                </a>
            @endisset

            @isset($pengaturanGate)
                <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.pengaturan', $row->id) }}">
                    <i class="fas fa-cog"></i> &nbsp;&nbsp;Pengaturan Indeks
                </a>
            @endisset

            @isset($viewGate)
                <a class="dropdown-item" href="{{ route('admin.' . $crudRoutePart . '.show', $row->id) }}">
                    <i class="fas fa-bars mr-2"></i> Detail
                </a>
            @endisset

            @isset($editGate)
                <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
                    <i class="fas fa-pencil-alt mr-2"></i> Edit
                </a>
            @endisset

            @isset($jadwalGate)
                <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.editStatus', $row->id) }}">
                    <i class="fas fa-pencil-alt mr-2"></i> Selesaikan
                </a>
            @endisset

            @isset($dpGate)
                <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.editDP', $row->id) }}">
                    <i class="fas fa-pencil-alt mr-2"></i> Bayar DP
                </a>
            @endisset

            @isset($lunasGate)
                <a class="dropdown-item btn-edit" href="{{ route('admin.' . $crudRoutePart . '.edit', $row->id) }}">
                    <i class="fas fa-pencil-alt mr-2"></i> Pelunasan
                </a>
            @endisset

            @isset($editGateSimple)
                <a href="#" class="dropdown-item btn-edit" data-id="{{ $row->id }}"><i class="fas fa-pencil-alt mr-2"></i> Edit </a>
            @endisset

            @isset($deleteGate)
                <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" id="deleteSubmit{{ $row->id }}">
                    @method('DELETE')
                    @csrf
                    <a href="#" class="dropdown-item btnDelete" id="hapus" data-id="{{ $row->id }}" data-nama="{{ $nama }}">
                        <i class="fas fa-trash danger mr-2"></i> Hapus
                    </a>
                </form>
            @endisset

            @isset($batalGate)
                <form action="{{ route('admin.' . $crudRoutePart . '.destroy', $row->id) }}" method="POST" id="deleteSubmit{{ $row->id }}">
                    @method('DELETE')
                    @csrf
                    <a href="#" class="dropdown-item btnDelete" id="hapus" data-id="{{ $row->id }}" data-nama="{{ $nama }}">
                        <i class="fas fa-trash danger mr-2"></i> Batalkan
                    </a>
                </form>
            @endisset
        </div>
    </div>
</div>
