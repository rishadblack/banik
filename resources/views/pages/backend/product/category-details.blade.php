@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Categories</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Categoty Information</x-slot:title>
                <div class="row">

                    <div class="col-6">
                        <x-input.text wire:model="name" label="Catagory Name" />
                    </div>
                    <div class="col-6">
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
                        <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                            class="btn-success">{{ $category_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.product.categorie_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Categories help in structuring your products or services, making it easier for users to navigate and
                    find what they need. <br><br> They create a hierarchical organization, allowing you to group similar
                    items
                    together. <br><br> For instance, in an e-commerce platform, you might have categories like
                    "Electronics,"
                    "Clothing," and "Home Decor."</p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
