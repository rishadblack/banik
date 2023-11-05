@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center m-3">
        <x-slot:title>Warehouse List</x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.setting.warehouse_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Warehouse</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.warehouse-table />
    </x-layouts.backend.card>
</div>
