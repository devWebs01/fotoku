@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.booking.store') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <x-form-select2 id='kecamatan_id' text='Kecamatan / Daerah' required='required' >
                                    @foreach ($kecamatan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_kecamatan }}</option>
                                    @endforeach
                                </x-form-select2>
                                <x-form-select2 id='fotografer_id' text='Fotografer' required='required' > </x-form-select2>
                                <x-form-select2 id='produk_id' text='Produk / Paket' required='required' > </x-form-select2>
                                <x-form-date id='tgl_acara' text='Tanggal Mulai Acara' addClass='dmy' required='required' />
                                <x-form-date id='jam' text='Jam Mulai Acara' addClass='jam' required='required' />
                                <x-form-textarea id='deskripsi_acara' text='Deskripsi Acara' required='required' ></x-form-textarea>
                            </div>
                            <div class="card-footer">
                                <input type="submit" value="Simpan" class="btn btn-success">
                                <a href="{{ route('admin.booking.index') }}" class="btn btn-light">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    let produk = @json($produk) ?? null ;

    if(produk != null){
        $('#kecamatan_id').val(produk.fotografer.kecamatan_id).trigger('change');
        $('#fotografer_id').empty().append('<option value="'+produk.fotografer_id+'">'+produk.fotografer.nama+'</option>');
        $('#produk_id').empty().append('<option value="'+produk.id+'">'+produk.nama_produk+' ( Rp.'+produk.harga+' )</option>');
    }

    $('#kecamatan_id').on('change', function(e){
        if($(this).val() != ''){
            $('#fotografer_id').empty().append('<option value="">[ Pilih Fotografer ]</option>');
        
            var id = e.target.value;
            $.get("{{ url('admin/fotografer/getFotograferFromKecamatan')}}/"+ id, function(response){
                $.each(response.data, function (key, data) {
                    $('#fotografer_id').append('<option value="'+data.id+'">'+data.nama+'</option>');
                })
            });
        }else if($(this).val() == ''){
            $('#fotografer_id').val('').trigger('change');
            $('#fotografer_id').empty().append('<option value="">[ Pilih Fotografer ]</option>');
        }
    });
   
    $('#fotografer_id').on('change', function(e){
        if($(this).val() != ''){
            $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
        
            var id = e.target.value;
            $.get("{{ url('admin/produk/getProdukFromUser')}}/"+ id, function(response){
                $.each(response.data, function (key, data) {
                    $('#produk_id').append('<option value="'+data.id+'">'+data.nama_produk+' ( Rp.'+data.harga+') </option>');
                })
            });
        }else if($(this).val() == ''){
            $('#produk_id').val('').trigger('change');
            $('#produk_id').empty().append('<option value="">[-- Pilih Select2 --]</option>');
        }
    });
</script>
@endpush

