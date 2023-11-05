@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Warehouse</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Warehouse Information</x-slot:title>
                <div class="row">
                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="name" label="Catagory Name" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="location" label="Location" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                            class="btn-success">{{ $warehouse_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.warehouse_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Customize and manage your business outlets with ease using our outlet settings feature. <br><br>
                    Tailor the settings for each location to match your specific operational needs. <br><br>Efficiently
                    manage the configuration and settings for your business outlets through our intuitive software to
                    streamline operations.</p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
