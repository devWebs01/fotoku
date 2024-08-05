<script>
    $(function () {
      let table = $("#User").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.fotografer.index') }}",
        columnDefs: [
        {
            // "targets": [ 0 ],
            // "visible": false
        }],
        columns: [
            { data: 'DT_RowIndex', orderable:false, searchable: false},
			{ data: 'nama', name: 'nama' },
			{ data: 'no_telp', name: 'no_telp' },
			{ data: 'alamat', name: 'alamat' },
			{ data: 'email', name: 'email' },
			{ data: 'status', name: 'status' },

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