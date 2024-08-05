<div class="form-group">
<label class="{{$required}}" for="{{$id}}">{{$text}} </label>
    <input class="{{$addClass}} {{ $errors->has($id) ? 'is-invalid' : '' }}" type="{{$type}}" name="{{$id}}" id="{{$id}}" value="{{ old($id, $value) }}" {{$required}}  {{$readonly}} >
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>