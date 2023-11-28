@props(['footer' => null])
<div wire:ignore.self id="{{ $attributes['id'] }}" data-bs-backdrop="static" data-bs-keyboard="false" class="modal fade" tabindex="-1">
    <div
        class="modal-dialog  modal-dialog-{{ $attributes['position'] ? $attributes['position'] : 'centered' }} {{ $attributes['size'] ? 'modal-' . $attributes['size'] : '' }}">
        <div class="modal-content">
            <div class="modal-header">
                @isset($title)
                    <h5 class="modal-title" id="{{ $attributes['id'] }}">{{ $title }}</h5>
                @endisset
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            @if (!isset($attributes['no-footer']))
                <div class="modal-footer">
                    {{ $footer != 'button' ? $footer : '' }}
                    <x-button.default class="btn btn-danger" data-bs-dismiss="modal">Close</x-button.default>
                </div>
            @endif
        </div>
    </div>
</div>
