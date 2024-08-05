{{-- Modal tambah --}}
<div class="modal fade" id="modal-tambahVariable">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Variable</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-tambahVariable" action="{{ route('admin.variable.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="indeks_id" name="indeks_id" value="{{ $data->id }}">
                    <x-form-input id='uraian' text='uraian' required='required' readonly='readonly' value='{{ $data->uraian }}' />
                    <x-form-select2 id='tatanan_id' text='tatanan_id' required='required' > 
                        @foreach ($data->tatanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nm_tatanan }}</option>
                        @endforeach
                    </x-form-select2>
                    <x-form-input id='nm_variable' text='nm_variable' required='required' />
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-action">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal Update --}}
<div class="modal fade" id="modal-editVariable">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Variable</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-editVariable" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <x-form-input id='indeks_id' text='indeks_id' required='required' readonly='readonly' value='{{ $data->uraian }}' />
                    <x-form-select2 id='tatanan_id' text='tatanan_id' required='required' > 
                        @foreach ($data->tatanan as $item)
                            <option value="{{ $item->id }}">{{ $item->nm_tatanan }}</option>
                        @endforeach
                    </x-form-select2>
                    <x-form-input id='nm_variable' text='nm_variable' required='required' />
            </div>
            <div class="modal-footer justify-content-between">
                <input type="hidden" name="id" id="id">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary btn-action">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>