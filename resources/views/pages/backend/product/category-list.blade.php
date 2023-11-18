@push('css')
    <style>
    </style>
@endpush
<div>
        <x-slot:title>Categories</x-slot:title>
        <x-slot:button>
            <x-button.default class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openCategoryModal')"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Category</x-button.default>
        </x-slot:button>

    <x-layouts.backend.card>
        <livewire:backend.product.datatable.category-table />
    </x-layouts.backend.card>

    <x-modal id="categoryModal">
        <x-slot:title>Category Information</x-slot:title>

        <x-input.text wire:model="name" label="Category Name" />
        <x-input.text wire:model="code" label="Code" />
        <x-input.select wire:model="status" label="Status" :options="config('status.common')" />

        <x-slot:footer>
            <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory" class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
