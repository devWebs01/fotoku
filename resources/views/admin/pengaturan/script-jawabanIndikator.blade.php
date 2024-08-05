<script>
    $(function () {
      let table = $("#JawabanIndikator").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/jawaban_indikator?indeks='.$data->id) }}",
        columnDefs: [
        {
            "targets": [ 1,2 ],
            "visible": false
        }],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable: false},
			{ data: 'variable_id', name: 'variable_id' },
			{ data: 'indikator_id', name: 'indikator_id' },
			{ data: 'uraian', name: 'uraian' },
			{ data: 'uraian_jawaban', name: 'uraian_jawaban' },
			{ data: 'skala', name: 'skala' },
			{ data: 'ket_banding', name: 'ket_banding' },
			{ data: 'ket_upload', name: 'ket_upload' },

            { data: 'actions', name: '{{ trans('global.actions') }}',orderable:false,searchable: false }
        ],
        order: [[ 1, 'desc' ]],
        pageLength: 25,
      });
        
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
        });

        $('.dataTables_filter input').unbind();
        $('.dataTables_filter input').bind('keyup', function(e){
            var code = e.keyCode || e.which;
            if (code == 13) {
                table.search(this.value).draw();
            }
        });

        $('#select-variable').on('change', function(e){
            table.column(1)
            .search($(this).val())
            .draw();
        });

        $('#select-indikator').on('change', function(){
            table.column(2)
            .search($(this).val())
            .draw();
        });
        
        $('#JawabanIndikator').on('click', '.btnDelete', function () {
            id = $(this).data("id");    
            nama = $(this).data("nama");  
            alertify.confirm('<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI HAPUS', '<h4>Apakah Anda Yakin HAPUS Jawaban Indikator '+nama+' ?</h4>', function(){ 
                $("#JawabanIndikator #deleteSubmit"+id).submit();
            }
            , function(){ 
            }).setting({
                'closable': false,
                'labels': {ok:'Ya Hapus!', cancel:'Tutup'},
                });;
        } );

        $('#JawabanIndikator').on('click', '.btn-edit', function () {
            let id = $(this).attr("data-id");
            $('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
            $.ajax({
                url: "{{ route('admin.jawaban_indikator.get') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response, status, xhr) {
                    if(xhr.status == 200){
                        var data = response.data;
                        $('#form-editJawabanIndikator').attr('action', `{{ url('admin/jawaban_indikator/${id}') }}`);
                        $('#modal-editJawabanIndikator #id').val(data.id);
                        
                        $('#form-editJawabanIndikator #indikator_id').empty().append('<option value="">[-- Pilih Indikator --]</option>');
                        $.each(response.indikator, function(key, value){
                            $('#form-editJawabanIndikator #indikator_id').append('<option value="'+value.id+'">'+value.uraian+'</option>');
                        });
                        $('#form-editJawabanIndikator #indikator_id').val(data.indikator_id).trigger('change');
                        $('#form-editJawabanIndikator #uraian_jawaban').val(data.uraian_jawaban);
                        $('#form-editJawabanIndikator #skala').val(data.skala);
                        $('#form-editJawabanIndikator #ket_banding').val(data.ket_banding).trigger('change');
                        $('#form-editJawabanIndikator #ket_upload').val(data.ket_upload).trigger('change');
                        
                        $('#modal-loading').modal('hide');
                        $('#modal-editJawabanIndikator').modal({backdrop: 'static', keyboard: false, show: true});
                    }
                },
                error: function (err) {
                    location.reload();
                }
            });
        })

        $('#modal-editJawabanIndikator .btn-action').click(function (event){
            var formUpdate = $('#modal-editJawabanIndikator form');
            var url = formUpdate.attr('action');
            event.preventDefault();
            $(this).prop('disabled', true).text('Menyimpan data...');
            $.ajax({
                url: url,
                type: "POST",
                data: formUpdate.serialize(),
                beforeSend: function() {
                    formUpdate.find('.text-danger').remove();
                    formUpdate.find('.form-group .is-invalid').removeClass('is-invalid');
                },
                success: function (response, status, xhr) {
                    if(xhr.status == 200){
                        location.reload();
                    }
                },
                error: function (err) {
                    if (err.status == 422){
                        $.each(err.responseJSON.errors, function (i, error) {
                            let el = $("#modal-editJawabanIndikator form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-editJawabanIndikator .btn-action').removeAttr('disabled').text('Update');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-editJawabanIndikator').on('hidden.bs.modal', function () {
            var formUpdate = $('#modal-editJawabanIndikator form');
            formUpdate.find('.text-danger').remove();
            formUpdate.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-editJawabanIndikator')[0].reset();
            $('#modal-editJawabanIndikator .btn-action').removeAttr('disabled').text('Update');
        })
        
    
        
    });
    
    
</script>