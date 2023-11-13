@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Categories</x-slot:title>
    <x-slot:button>
            <x-button.default class="btn d-flex float-end btn-theme" data-bs-toggle="modal" data-bs-target="#addNew"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Category</x-button.default>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.product.datatable.category-table />
    </x-layouts.backend.card>

    <x-modal id="addNew">
        <x-layouts.backend.card>
            <x-slot:title>Category Information</x-slot:title>
            <x-input.text wire:model="name" label="Category Name" />
            <x-input.text wire:model="code" label="Code" />
            <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>
            <div class="float-end mt-3">
                <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                    class="btn-success">Save</x-button.default>
                <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory" class="btn-success">Save &
                    New
                </x-button.default>
            </div>
        </x-layouts.backend.card>
    </x-modal>
</div>
