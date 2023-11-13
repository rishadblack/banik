@push('css')
    <style>

    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Brand List</x-slot:title>
        <x-slot:button>
            <x-button.default class="btn d-flex float-end btn-theme" data-bs-toggle="modal" data-bs-target="#addNew"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Brand</x-button.default>
        </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.product.datatable.brand-table />
    </x-layouts.backend.card>

    <x-modal id="addNew">
        <x-layouts.backend.card>
            <x-slot:title>Brand Information</x-slot:title>
            <x-input.text wire:model="name" label="Brand Name" />
            <x-input.text wire:model="code" label="Code" />
            <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>
            <div class="float-end mt-3">
                <x-button.default wire:click="storeVendor" wire:target="storeVendor"
                    class="btn-success">Save</x-button.default>
                <x-button.default wire:click="storeVendor('new')" wire:target="storeVendor" class="btn-success">Save &
                    New
                </x-button.default>
            </div>
        </x-layouts.backend.card>
    </x-modal>
</div>
