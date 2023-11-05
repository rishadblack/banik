<div class="form-group">
    @isset($attributes['label'])
        <label class="form-label" for="{{$attributes->wire('model')->value}}">{{ $attributes['label'] }}</label>
    @endisset
    <div class="form-control-wrap">
        <div class="form-control-wrap">
            <div class="input-group">
                <input @if($attributes['read-only']) readonly @endif type="text" list="{{$attributes->wire('model')->value}}_list" {{$attributes->wire('model')}} id="{{$attributes->wire('model')->value}}" class="form-control invalid @error($attributes->wire('model')->value) invalid @enderror {{ $attributes['class'] }}" placeholder="{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Please Type '.$attributes['label']  }}">
                @if($attributes[$attributes->wire('model')->value.'_name'])
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$attributes[$attributes->wire('model')->value.'_name']}}</span>
                </div>
                @endif
            </div>
        </div>

    @error($attributes->wire('model')->value) <div class="invalid">{{ $message }}</div>@enderror
    </div>
</div>
