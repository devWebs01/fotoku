<div class="form-group">
    <label  class="{{$required}}">{{$text}}</label>
    <textarea name="{{$id}}" id="{{$id}}" class="form-control {{ $errors->has($id) ? 'is-invalid' : '' }}" {{$required}}  {{$readonly}} >{{ old($id, $value) }}{{$slot}}</textarea>
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>