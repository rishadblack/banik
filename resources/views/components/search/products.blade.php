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
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->code}} | {{$product->name}}</option>
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
            valueField: 'id',
            labelField: 'name',
            searchField: ['id', 'name', 'code'],
            load: (query, callback) => {
                axios.get("{{ route('backend.search', ['type' => 'products']) }}", {
                        params: {
                            search: query
                        }
                    })
                    .then(response => {
                        callback(response.data);
                    }).catch(function(error) {
                        callback();
                    });
            },
            render: {
                option: function(item, escape) {
                    return `<div class="py-1 d-flex">
                                <div>
                                    <div>
                                        <span class="h6">
                                            ${ escape(item.name) }
                                        </span>
                                        <span class="text-muted"> | ${ escape(item.code) }</span>
                                    </div>
                                    <div class="description"> ${ escape(item.name) }</div>
                                </div>
                            </div>`;
                },
                item: function(item, escape) {
                    return `<div> ${ escape(item.code) } | ${ escape(item.name) }</div>`;
                }
            },
            loadThrottle: 1000
        };

        document.addEventListener("DOMContentLoaded", function(event) {
            var select{{ $jsId }} = new TomSelect(document.getElementById("{{ $jsId }}"),
                config{{ $jsId }});

            window.addEventListener("{{ $attributes->wire('model')->value }}_update", event => {
                select{{ $jsId }}.addOption({
                    id: event.detail.id,
                    name: event.detail.name,
                    code: event.detail.code,
                    company: event.detail.company,
                    mobile: event.detail.mobile,
                });

                select{{ $jsId }}.setValue(event.detail.id);
            });

            window.addEventListener("{{ $attributes->wire('model')->value }}_reset", event => {
                select{{ $jsId }}.clear();
            });

            window.addEventListener("typeahead_reset", event => {
                select{{ $jsId }}.clear();
            });

            window.addEventListener("type", event => {
                console.log('check');
            });
        });
    </script>
@endpush
