<script>
    $(function () {
      let table = $("#Variable").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/variable?indeks='.$data->id) }}",
        columnDefs: [
        {
            // "targets": [ 0 ],
            // "visible": false
        }],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable: false},
			{ data: 'tatanan_id', name: 'tatanan_id' },
			{ data: 'nm_variable', name: 'nm_variable' },

            { data: 'actions', name: '{{ trans('global.actions') }}',orderable:false,searchable: false }
        ],
        order: [[ 1, 'desc' ]],
        pageLength: 10,
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

        // tambah
        $('#modal-tambahVariable .btn-action').click(function (event){
            var formStore = $('#modal-tambahVariable form');
            event.preventDefault();
            $(this).prop('disabled', true).text('Menyimpan data...');
            $.ajax({
                url: "{{ route('admin.variable.store') }}",
                type: "POST",
                data: formStore.serialize(),
                beforeSend: function() {
                    formStore.find('.text-danger').remove();
                    formStore.find('.form-group .is-invalid').removeClass('is-invalid');
                },
                success: function (response, status, xhr) {
                    if(xhr.status == 200){
                        location.reload();
                    }
                },
                error: function (err) {
                    if (err.status == 422){
                        $.each(err.responseJSON.errors, function (i, error) {
                            let el = $("#modal-tambahVariable form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-tambahVariable .btn-action').removeAttr('disabled').text('Simpan');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-tambahVariable').on('hidden.bs.modal', function () {
            var formStore = $('#modal-tambahVariable form');
            formStore.find('.text-danger').remove();
            formStore.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-tambah')[0].reset();
            $('#modal-tambahVariable .btn-action').removeAttr('disabled').text('Simpan');
        })

        // delete
        $('#Variable').on('click', '.btnDelete', function () {
            id = $(this).data("id");    
            nama = $(this).data("nama");  
            alertify.confirm('<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI HAPUS', '<h4>Apakah Anda Yakin HAPUS '+nama+' ?</h4>', function(){ 
                $("#Variable #deleteSubmit"+id).submit();
            }
            , function(){ 
            }).setting({
                'closable': false,
                'labels': {ok:'Ya Hapus!', cancel:'Tutup'},
                });;
        } );

        // edit 
        $('#Variable').on('click', '.btn-edit', function () {
            let id = $(this).attr("data-id");
            $('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
            $.ajax({
                url: "{{ route('admin.variable.get') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response, status, xhr) {
                    if(xhr.status == 200){
                        var data = response.data;
                        $('#form-editVariable').attr('action', `{{ url('admin/variable/${id}') }}`);
                        $('#modal-editVariable #id').val(data.id);
                        $('#form-editVariable #tatanan_id').val(data.tatanan_id).trigger('change');
                        $('#form-editVariable #nm_variable').val(data.nm_variable);

                        $('#modal-loading').modal('hide');
                        $('#modal-editVariable').modal({backdrop: 'static', keyboard: false, show: true});
                    }
                },
                error: function (err) {
                    location.reload();
                }
            });
        })
    
        $('#modal-editVariable .btn-action').click(function (event){
            var formUpdate = $('#modal-editVariable form');
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
                            let el = $("#modal-editVariable form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-editVariable .btn-action').removeAttr('disabled').text('Update');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-editVariable').on('hidden.bs.modal', function () {
            var formUpdate = $('#modal-editVariable form');
            formUpdate.find('.text-danger').remove();
            formUpdate.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-editVariable')[0].reset();
            $('#modal-editVariable .btn-action').removeAttr('disabled').text('Update');
        })

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