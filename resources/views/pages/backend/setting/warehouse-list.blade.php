@push('css')
    <style>
    </style>
@endpush
<div>
    <x-slot:title>Warehouse List</x-slot:title>
    <x-slot:button>
        <x-button.default class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openWarehouseModal')">
            <i class="fa fa-plus-circle fa-fw mt-1 me-1"></i>
            Add Warehouse
        </x-button.default>
    </x-slot:button>
    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.warehouse-table />
    </x-layouts.backend.card>

    <x-modal id="warehouseModal">
        <x-slot:title>Warehouse Information</x-slot:title>
        <div class="row">
            <div class="col-6"><x-input.text wire:model="code" label="Code" /></div>
            <div class="col-6">
        <x-input.text wire:model="name" label="Name" />
            </div>
            <div class="col-12"> <x-input.text wire:model="address" label="Address" /></div>
            <div class="col-6">
                <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
            </div>
        </div>

        <x-slot:footer>
            <x-button.default wire:click="storeWarehouse" wire:target="storeWarehouse"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeWarehouse('new')" wire:target="storeWarehouse" class="btn-success">Save & New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
