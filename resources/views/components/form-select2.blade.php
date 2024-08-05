<div class="form-group">
    <label class="{{$required}}">{{$text}}</label>
    <select class="form-control select2 {{ $errors->has($id) ? 'is-invalid' : '' }}" name="{{$id}}" id="{{$id}}" {{$required}}>\
        <option value disabled {{ old($id, null) === null ? 'selected' : '' }}>Pilih {{$text}}</option>
        {{$slot}}
        {{-- <option value="{{ $item->id }}" {{ old($id, $value) === (string) $item->id ? 'selected' : '' }}> {{$item->$kolom}} </option> --}}
    </select>
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>