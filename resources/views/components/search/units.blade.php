@php
    $jsId = str_replace(['.', '_'], '', $attributes->wire('model')->value);
@endphp
<div class="form-group">
    @if ($attributes['label'])
        <label class="form-label">{{ $attributes['label'] }}</label>
    @endif
    <div class="form-control-wrap" wire:key="{{ $jsId }}">
        <div wire:ignore>
            <select id="{{ $jsId }}" @if (isset($attributes['multiple']) && $attributes['multiple']) multiple @endif
                {{ $attributes->wire('model') }}
                class="@error($attributes->wire('model')->value) invalid @enderror {{ $attributes['class'] }}">
                <option value="">
                    {{ isset($attributes['placeholder']) ? $attributes['placeholder'] : 'Select ' . $attributes['label'] }}
                </option>
                @foreach ($units as $unit)
                    <option value="{{$unit->id}}">{{$unit->name}}</option>
                @endforeach
            </select>
        </div>
        @error($attributes->wire('model')->value)
            <div class="invalid" style="color:red">{{ $message }}</div>
        @enderror
    </div>
</div>

@push('js')
    <script>
        var config{{ $jsId }} = {

        };

        document.addEventListener("DOMContentLoaded", function(event) {
            var select{{ $jsId }} = new TomSelect(document.getElementById("{{ $jsId }}"),
                config{{ $jsId }});

            window.addEventListener("{{ $attributes->wire('model')->value }}_update", event => {
                select{{ $jsId }}.setValue(@this.{{ $attributes->wire('model')->value }});
            });

            window.addEventListener("typeahead_update", event => {
                select{{ $jsId }}.setValue(@this.{{ $attributes->wire('model')->value }});
            });

            window.addEventListener("{{ $attributes->wire('model')->value }}_reset", event => {
                select{{ $jsId }}.clear();
            });

            window.addEventListener("typeahead_reset", event => {
                select{{ $jsId }}.clear();
            });
        });
    </script>
@endpush
