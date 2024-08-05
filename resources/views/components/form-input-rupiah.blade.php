<div class="form-group {{$id}}">
<label class="{{$required}}" for="{{$id}}">{{$text}} </label>
    <input class="form-control currency {{ $errors->has($id) ? 'is-invalid' : '' }}" type="text" name="{{$id}}" id="{{$id}}" value="{{ old($id, $value) }}" {{$required}}  {{$readonly}} data-a-sign="Rp. " data-a-dec="," data-a-sep="." >
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>