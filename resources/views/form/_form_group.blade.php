<div class="form-group {{$errors->has($field)?'has-error':''}}">
    {{ $slot }}
    <span class="help-block">
        {{$errors->first($field)}}
    </span>
</div>
