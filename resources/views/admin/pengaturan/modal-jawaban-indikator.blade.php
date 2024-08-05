{{-- Modal Update --}}
<div class="modal fade" id="modal-editJawabanIndikator">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Jawaban Indikator</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-editJawabanIndikator" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <x-form-select2 id='indikator_id' text='indikator_id' required='required' > </x-form-select2>
                    <x-form-input id='uraian_jawaban' text='uraian_jawaban' required='required' />
                    <x-form-number id='skala' text='skala' type='number' required='required' />
                    <x-form-select2 id='ket_upload' text='ket_upload' required='required'>
                        @foreach ($arr_keterangan as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </x-form-select2>
                    <x-form-select2 id='ket_banding' text='ket_banding' required='required' >
                        @foreach ($arr_keterangan as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </x-form-select2>
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