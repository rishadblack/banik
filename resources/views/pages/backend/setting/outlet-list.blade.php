@push('css')
    <style>
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Outlet List</x-slot:title>
        <x-slot:button>
            <a href="{{ route('backend.setting.outlet_details') }}" wire:navigate class="btn d-flex float-end btn-theme">
                <i class="fa fa-plus-circle fa-fw mt-1 me-1"></i>
                Add Outlet
            </a>
        </x-slot:button>
    </div>
    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.outlet-table />
    </x-layouts.backend.card>
</div>
