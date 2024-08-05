<div class="form-group">
    <label class="{{$required}}">{{$text}}</label>
    <div style="padding-bottom: 4px">
        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
    </div>
    <select class="form-control select2 {{ $errors->has($id) ? 'is-invalid' : '' }}" name="{{$id}}[]" id="{{$id}}" multiple {{$required}}>\
        @foreach($array as $item)
            <option value="{{ $item->id }}" {{ (in_array($item->id, old($id, [])) || $collection->contains($item->id)) ? 'selected' : '' }}> {{$item->$kolom}} </option>
        @endforeach
    </select>
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>