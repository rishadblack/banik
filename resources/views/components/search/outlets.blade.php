<div class="form-group">
    @if ($attributes['label'])
        <label class="form-label" for="{{ $attributes->wire('model')->value }}">{{ $attributes['label'] }}</label>
        @isset($attributes['require'])
                <span class="text-red">*</span>
            @endisset
    @endif
    <select id="{{ $attributes->wire('model')->value }}" name="{{ $attributes->wire('model')->value }}"
        {{ $attributes->wire('model') }}
        class="form-control @error($attributes->wire('model')->value) invalid @enderror {{ $attributes['class'] }}">
        <option value="">
            {{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Select ' . $attributes['label'] }}
        </option>
        @foreach ($outlets as $outlet)
            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
        @endforeach
    </select>
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
