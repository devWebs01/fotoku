<div class="form-group">
<label class="{{$required}}" for="{{$id}}">{{$text}} </label>
    <div class="input-group">
        <input class="form-control {{$addClass}} {{ $errors->has($id) ? 'is-invalid' : '' }}" type="{{$type}}" name="{{$id}}" id="{{$id}}" value="{{ old($id, $value) }}" {{$required}}  {{$readonly}} autocomplete="off">
        <div class="input-group-append">
            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
        </div>
    </div> 
    @if($errors->has($id))
        <span class="text-danger">{{ $errors->first($id) }}</span>
    @endif
    <span class="help-block"> {{$keterangan}}</span>
</div>