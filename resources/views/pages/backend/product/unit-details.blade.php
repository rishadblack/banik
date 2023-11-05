@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div class="container">
    <div class="d-flex align-items-center mb-3">
        <div>
            <x-slot:title>Create/Update Unit</x-slot:title>
        </div>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Unit Information</x-slot:title>

                <div class="row">
                    <div class="col-md-6">
                        <x-input.text wire:model="name" label="Unit Name" />
                    </div>
                    <div class="col-md-6">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
            <x-slot:title>Note</x-slot:title>
            <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeUnit" wire:target="storeUnit"
                            class="btn-success">{{ $unit_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeUnit('new')" wire:target="storeUnit" class="btn-success">Save &
                            New
                        </x-button.default>
                        <a href="{{ route('backend.product.unit_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
            <p>Units are a fundamental part of managing inventory, especially in e-commerce and retail SaaS solutions. <br><br>
                They define the measurement or quantity used to track products. Common examples include "each," "dozen,"
                "pound," or "liter." <br><br> Creating and managing units ensures accurate product listings and inventory
                tracking.</p>
            </x-layouts.backend.card>
        </div>
    </div>
</div>
