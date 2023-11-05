{{-- <div class="form-group btn btn-theme fs-13px fw-semibold fileinput-button me-2 mb-1">
    @isset($attributes['label'])
        <label class="form-label" for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}</label>
    @endisset
    <div class="custom-file">
        <input type="file" id="{{ $attributes->wire('model')->value }}-{{ rand() }}"
            {{ $attributes->wire('model') }}
            class="custom-file-input @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}">
        <label wire:loading.remove wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}"></label>
        <label wire:loading wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}">Uploading...</label>
        @error($attributes->wire('model')->value)
            <span class="error"><small>{{ $message }}</small></span>
        @else
            <span>Max {{ $attributes['size'] }} </span>
        @enderror
    </div>
</div> --}}



{{-- <div class="form-group">
    @isset($attributes['label'])
        <label class="form-label" for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}</label>
    @endisset
    <input type="file" class="form-control" id="{{ $attributes->wire('model')->value }}-{{ rand() }}"
        {{ $attributes->wire('model') }} />
    <div
        {{ $attributes->merge(['class' => 'custom-file  btn btn-theme fs-13px fw-semibold fileinput-button me-2 mb-1']) }}>
        {{ $slot }}
        <input type="file" id="formFileMultiple" multiple
            id="{{ $attributes->wire('model')->value }}-{{ rand() }}" {{ $attributes->wire('model') }}
            class="custom-file-input @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}">
        <label wire:loading.remove wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}"></label>
        <label wire:loading wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
            for="{{ $attributes->wire('model')->value }}">Uploading...</label>
        @error($attributes->wire('model')->value)
            <span class="error"><small>{{ $message }}</small></span>
        @elseif(isset($attributes['size']))
            <span>Max {{ $attributes['size'] }} </span>
        @enderror
    </div>
</div> --}}

<div class="form-group">
    @isset($attributes['label'])
        <label class="form-label" for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}</label>
    @endisset
    <input type="file"
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror {{ $attributes['class'] }}"
        id="{{ $attributes->wire('model')->value }}-{{ rand() }}" {{ $attributes->wire('model') }} />
    <label wire:loading wire:target="{{ $attributes->wire('model')->value }}" class="custom-file-label"
        for="{{ $attributes->wire('model')->value }}">Uploading...</label>
    @error($attributes->wire('model')->value)
        <span class="error"><small>{{ $message }}</small></span>
    @elseif(isset($attributes['size']))
        <span>Max {{ $attributes['size'] }} </span>
    @enderror
</div>
