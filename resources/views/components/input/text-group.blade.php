@props(['suffix', 'prefix'])
<div class="form-group mb-0">
    @isset($attributes['label'])
        <label for="{{ $attributes->wire('model')->value }}" class="form-label">{{ $attributes['label'] }}
            @isset($attributes['require'])
                <span class="text-red">(*)</span>
            @endisset
        </label>
    @endisset
    <div class="input-group">
        @isset($prefix)
            {{ $prefix }}
        @endisset
        <input @if ($attributes['read-only']) readonly @endif {{ $attributes->wire('model') }} onFocus="this.select()"
            type="text" id="{{ $attributes->wire('model')->value }}"
            class="form-control @error($attributes->wire('model')->value) invalid @enderror {{ $attributes['class'] }}"
            placeholder="{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Please Type ' . $attributes['label'] }}" />
        @isset($suffix)
            {{ $suffix }}
        @endisset
    </div>
</div>
