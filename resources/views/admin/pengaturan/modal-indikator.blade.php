{{-- Modal Update --}}
<div class="modal fade" id="modal-editIndikator">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Indikator</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-editIndikator" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <x-form-select2 id='variable_id' text='variable_id' required='required'>
                    </x-form-select2>
                    <x-form-input id='uraian' text='uraian' required='required' />
                    <x-form-textarea id='defenisi_operasional' text='defenisi_operasional' required='required' />
                    <x-form-textarea id='ketersediaan_data' text='ketersediaan_data' required='required' />
                    <x-form-textarea id='bukti_data' text='bukti_data' required='required'/>
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