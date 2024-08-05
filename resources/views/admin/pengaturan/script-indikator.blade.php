<script>
    $(function () {
      let table = $("#Indikator").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/indikator?indeks='.$data->id) }}",
        columnDefs: [
        {
            "targets": [ 1,2 ],
            "visible": false
        }],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable: false},
			{ data: 'variable_id', name: 'variable_id' },
			{ data: 'id', name: 'id' },
			{ data: 'nm_variable', name: 'nm_variable' },
			{ data: 'uraian', name: 'uraian' },
			{ data: 'defenisi_operasional', name: 'defenisi_operasional' },
			{ data: 'ketersediaan_data', name: 'ketersediaan_data' },
			{ data: 'bukti_data', name: 'bukti_data' },

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

        $('#select-variable').on('change', function(){
            table.column(1)
            .search($(this).val())
            .draw();
        });
        
        $('#select-indikator').on('change', function(){
            table.column(2)
            .search($(this).val())
            .draw();
        });

        $('#Indikator').on('click', '.btnDelete', function () {
            id = $(this).data("id");    
            nama = $(this).data("nama");  
            alertify.confirm('<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI HAPUS', '<h4>Apakah Anda Yakin HAPUS '+nama+' ?</h4>', function(){ 
                $("#Indikator #deleteSubmit"+id).submit();
            }
            , function(){ 
            }).setting({
                'closable': false,
                'labels': {ok:'Ya Hapus!', cancel:'Tutup'},
                });;
        } );

        $('#Indikator').on('click', '.btn-edit', function () {
            let id = $(this).attr("data-id");
            $('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
            $.ajax({
                url: "{{ route('admin.indikator.get') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response, status, xhr) {
                    if(xhr.status == 200){
                        var data = response.data;
                        $('#form-editIndikator').attr('action', `{{ url('admin/indikator/${id}') }}`);
                        $('#modal-editIndikator #id').val(data.id);
                        $('#form-editIndikator #variable_id').empty().append('<option value="">[-- Pilih Variable --]</option>');
                        $.each(response.variable, function(key, value){
                            $('#form-editIndikator #variable_id').append('<option value="'+value.id+'">'+value.nm_variable+'</option>');
                        });
                        $('#form-editIndikator #variable_id').val(data.variable_id).trigger('change');
                        $('#form-editIndikator #uraian').val(data.uraian);
                        $('#form-editIndikator #defenisi_operasional').val(data.defenisi_operasional);
                        $('#form-editIndikator #ketersediaan_data').val(data.ketersediaan_data);
                        $('#form-editIndikator #bukti_data').val(data.bukti_data);
                        $('#modal-loading').modal('hide');
                        $('#modal-editIndikator').modal({backdrop: 'static', keyboard: false, show: true});
                    }
                },
                error: function (err) {
                    location.reload();
                }
            });
        })

        $('#modal-editIndikator .btn-action').click(function (event){
            var formUpdate = $('#modal-editIndikator form');
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
                            let el = $("#modal-editIndikator form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-editIndikator .btn-action').removeAttr('disabled').text('Update');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-editIndikator').on('hidden.bs.modal', function () {
            var formUpdate = $('#modal-editIndikator form');
            formUpdate.find('.text-danger').remove();
            formUpdate.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-editIndikator')[0].reset();
            $('#modal-editIndikator .btn-action').removeAttr('disabled').text('Update');
        })

        // delete
        // $('body').on('click', '.btnDelete', function () {
        //     id = $(this).data("id");    
        //     nama = $(this).data("nama");  
        //     alertify.confirm('<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI HAPUS', '<h4>Apakah Anda Yakin HAPUS '+nama+' ?</h4>', function(){ 
        //         $("#deleteSubmit"+id).submit();
        //     }
        //     , function(){ 
        //     }).setting({
        //         'closable': false,
        //         'labels': {ok:'Ya Hapus!', cancel:'Tutup'},
        //         });;
        // } );

        //jump menu
        // $('.jump').on('change', function(){
        //     table.column(2)
        //     .search($(this).val())
        //     .draw();
        // });

        // trigger
        // $('#mySelect').on('change', function(e){
        //     if($(this).val() != ''){
		// 		$('#select_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
			
		// 		var id = e.target.value;
		// 		$.get("{{ url('admin/tatanan/get')}}/"+ id, function(data){
		// 			$('#select_id').append('<option value="'+data.id+'">'+data+'</option>');
		// 		});
		// 	}else if($(this).val() == ''){
		// 		$('#select_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
		// 	}
        // })
    
        
    });
    
    
</script>