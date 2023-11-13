<div>
    <x-slot:title>Units</x-slot:title>
    <x-slot:button>
        <x-button.default class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openUnitModal')"><i
                class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Unit</x-button.default>
    </x-slot:button>
    <x-layouts.backend.card>
        <livewire:backend.product.datatable.unit-table />
    </x-layouts.backend.card>

    <x-modal id="unitModal">
        <x-slot:title>Unit Information</x-slot:title>
        <x-input.text wire:model="name" label="Unit Name" />
        <x-input.text wire:model="code" label="Code" />
        <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
        <x-slot:footer>
            <x-button.default wire:click="storeUnit" wire:target="storeUnit" class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeUnit('new')" wire:target="storeUnit" class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
