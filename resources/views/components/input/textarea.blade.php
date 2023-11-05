
<div class="form-group mt-2">
    <label for="{{ $attributes->wire('model')->value }}" class="form-label">{{ $attributes['label'] }}</label>
    <textarea id="{{ $attributes->wire('model')->value }}"
        class="form-control @error($attributes->wire('model')->value) is-invalid @enderror" {!! $attributes->merge(['class' => 'form-control']) !!}
        placeholder="{{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Please Type ' . $attributes['label'] }}"></textarea>
    @error($attributes->wire('model')->value)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
