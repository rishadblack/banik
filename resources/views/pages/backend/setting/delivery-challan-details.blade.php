@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Delivery Challan</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Delivery Challan Information</x-slot:title>
                <div class="row">

                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="product_name" label="Product Name" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="quantity" label="Quantity" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Delivery Info</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                            class="btn-success">{{ $challan_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.delivery_challan_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model="name" label="Delivery Man Name" placeholder="Name" />
                <x-input.text wire:model="code" label="Delivery Man Mobile" placeholder="Mobile" />
                <x-input.text wire:model="vehicle" label="Vehicle Type/No" />

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-input.textarea wire:model="note" label="Note" />
            </x-layouts.backend.card>

        </div>


    </div>
</div>
