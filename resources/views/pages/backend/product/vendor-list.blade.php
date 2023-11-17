@push('css')
    <style>

    </style>
@endpush
<div>
        <x-slot:title>Brand List</x-slot:title>
        <x-slot:button>
            <x-button.default class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openBrandModal')"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Brand</x-button.default>
        </x-slot:button>

    <x-layouts.backend.card>
        <livewire:backend.product.datatable.brand-table />
    </x-layouts.backend.card>

    <x-modal id="brandModal">
        <x-slot:title>Brand Information</x-slot:title>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="code" label="Code" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="name" label="Brand Name" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.select wire:model="status" label="Status" :options="config('status.common')" /></div>
        </div>
        <x-slot:footer>
            <x-button.default wire:click="storeVendor" wire:target="storeVendor"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeVendor('new')" wire:target="storeVendor" class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
