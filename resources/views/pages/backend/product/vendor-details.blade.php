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
            <x-slot:title>Create/Update Brand</x-slot:title>
        </div>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">

            <x-layouts.backend.card>
                <x-slot:title>Brand Information</x-slot:title>

                <div class="row">
                    <div class="col-md-6">
                        <x-input.text wire:model="name" label="Brand Name" />
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
                        <x-button.default wire:click="storeVendor" wire:target="storeVendor"
                            class="btn-success">{{ $vendor_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeVendor('new')" wire:target="storeVendor"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.product.vendor_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>

                <p>Brands are crucial for branding and marketing. <br><br> They represent the manufacturer or creator of
                    a product. <br><br>
                    When you create and manage brands in your SaaS platform, you can associate products with their
                    respective brands, which helps customers make purchasing decisions and builds brand recognition.</p>
            </x-layouts.backend.card>

        </div>
    </div>
</div>
