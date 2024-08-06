<script>
    let link = @json($link);
    $(function () {
        let table = $("#Booking").DataTable({
            processing: true,
            serverSide: true,
            ajax: link,
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'pelanggan_id', name: 'pelanggan_id' },
                { data: 'produk_id', name: 'produk_id' },
                { data: 'jadwal', name: 'jadwal' },
                { data: 'total_booking', name: 'total_booking' },
                { data: 'total_bayar', name: 'total_bayar' },
                { data: 'status_booking', name: 'status_booking' },
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ],
            order: [[1, 'desc']],
            pageLength: 25,
        });

        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });

        $('.dataTables_filter input').unbind();
        $('.dataTables_filter input').bind('keyup', function (e) {
            var code = e.keyCode || e.which;
            if (code === 13) {
                table.search(this.value).draw();
            }
        });

        // delete
        $('body').on('click', '.btnDelete', function () {
            var id = $(this).data("id");
            var nama = $(this).data("nama") || 'Nama tidak tersedia';
            alertify.confirm(
                '<i class="fa fa-exclamation-triangle mr-2" aria-hidden="true" id="hapus"></i> KONFIRMASI BATAL',
                '<h4>Apakah Anda Yakin BATALKAN Pemesanan: ' + nama + '?</h4>',
                function () {
                    $("#deleteSubmit" + id).submit();
                },
                function () { }
            ).setting({
                'closable': false,
                'labels': { ok: 'Ya BATAL!', cancel: 'Tutup' },
            });
        });
    });
</script>
