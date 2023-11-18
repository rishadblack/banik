@push('css')
    <style>
    </style>
@endpush
<div>
    <x-slot:title>Outlet List</x-slot:title>
    <x-slot:button>
        <x-button.default class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openOutletModal')">
            <i class="fa fa-plus-circle fa-fw mt-1 me-1"></i>
            Add Outlet
        </x-button.default>
    </x-slot:button>
    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.outlet-table />
    </x-layouts.backend.card>

    <x-modal id="outletModal">
        <x-slot:title>Outlet Information</x-slot:title>
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
            <x-button.default wire:click="storeOutlet" wire:target="storeOutlet"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeOutlet('new')" wire:target="storeOutlet" class="btn-success">Save & New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
