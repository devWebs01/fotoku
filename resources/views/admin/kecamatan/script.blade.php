<script>
    $(function () {
      let table = $("#Kecamatan").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.kecamatan.index') }}",
        columnDefs: [
        {
            // "targets": [ 0 ],
            // "visible": false
        }],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable: false},
			{ data: 'nama_kecamatan', name: 'nama_kecamatan' },
			{ data: 'keterangan', name: 'keterangan' },

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

        // tambah
        $('#modal-tambah .btn-action').click(function (event){
            var formStore = $('#modal-tambah form');
            event.preventDefault();
            $(this).prop('disabled', true).text('Menyimpan data...');
            $.ajax({
                url: "{{ route('admin.kecamatan.store') }}",
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
                            let el = $("#modal-tambah form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-tambah .btn-action').removeAttr('disabled').text('Simpan');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-tambah').on('hidden.bs.modal', function () {
            var formStore = $('#modal-tambah form');
            formStore.find('.text-danger').remove();
            formStore.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-tambah')[0].reset();
            $('#modal-tambah .btn-action').removeAttr('disabled').text('Simpan');
        })

        // delete
        $('body').on('click', '.btnDelete', function () {
            id = $(this).data("id");    
            nama = $(this).data("nama");  
            alertify.confirm('<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI HAPUS', '<h4>Apakah Anda Yakin HAPUS '+nama+' ?</h4>', function(){ 
                $("#deleteSubmit"+id).submit();
            }
            , function(){ 
            }).setting({
                'closable': false,
                'labels': {ok:'Ya Hapus!', cancel:'Tutup'},
                });;
        } );

        // edit 
        $('body').on('click', '.btn-edit', function () {
            let id = $(this).attr("data-id");
            $('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
            $.ajax({
                url: "{{ route('admin.kecamatan.get') }}",
                type: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response, status, xhr) {
                    if(xhr.status == 200){
                        var data = response.data;
                        $('#form-edit').attr('action', `{{ url('admin/kecamatan/${id}') }}`);
                        $('#id').val(data.id);
$('#form-edit #nama_kecamatan').val(data.nama_kecamatan);
$('#form-edit #keterangan').val(data.keterangan);

                        $('#modal-loading').modal('hide');
                        $('#modal-edit').modal({backdrop: 'static', keyboard: false, show: true});
                    }
                },
                error: function (err) {
                    location.reload();
                }
            });
        })
    
        $('#modal-edit .btn-action').click(function (event){
            var formUpdate = $('#modal-edit form');
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
                            let el = $("#modal-edit form").find('[name="'+i+'"]');
                            el.addClass( "is-invalid" );
                            el.after($('<span class="text-danger">'+error[0]+'</span>'));
                        });
                        $('#modal-edit .btn-action').removeAttr('disabled').text('Update');
                    }else{
                        location.reload();
                    }
                }
            })
        })
          
        $('#modal-edit').on('hidden.bs.modal', function () {
            var formUpdate = $('#modal-edit form');
            formUpdate.find('.text-danger').remove();
            formUpdate.find('.form-group .is-invalid').removeClass('is-invalid');
            $('#form-edit')[0].reset();
            $('#modal-edit .btn-action').removeAttr('disabled').text('Update');
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