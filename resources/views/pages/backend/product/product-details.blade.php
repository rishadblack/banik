@push('css')
    <style>
        .small {
            margin-top: 10px;
        }

        .card-title {
            margin-left: 20px;
            margin-top: 20px;
        }

        .varient .col-4 {
            margin-bottom: 8px;
        }
    </style>
@endpush

<div>
    <div class="container">
        <div class="d-flex align-items-center mb-3">
            <div>
                <x-slot:title>{{ $product_id ? 'Update' : 'Create' }} Product</x-slot:title>
            </div>
        </div>
        <div class="row gx-4">
            <div class="col-xl-8">
                <x-layouts.backend.card>
                    <x-slot:title>Product Information</x-slot:title>
                    <div class="row">
                        <div class="mb-3 col-sm-12 col-lg-6">
                            <x-input.text wire:model="name" label="Name" />
                        </div>
                        <div class="mb-3 col-sm-12 col-lg-6">
                            <x-input.text wire:model="code" label="Code" />
                        </div>

                        <div class="mb-3">
                            <x-input.textarea wire:model="description" label="Description" class="summernote"
                                rows="10" />
                        </div>
                    </div>

                </x-layouts.backend.card>
                <x-layouts.backend.card>
                    <x-slot:title>Product Purchase and Sale</x-slot:title>
                    <div class="row">
                        <div class="mb-3 col-sm-12 col-lg-4">
                            <x-input.text-group wire:model="net_purchase_price" label="Purchase Price"
                                placeholder="Price">
                                <x-slot:suffix>
                                    <span class="btn btn-default">৳</span>
                                </x-slot:suffix>
                            </x-input.text-group>
                        </div>
                        <div class="mb-3 col-sm-12 col-lg-4">
                            <x-input.text-group wire:model="net_sale_price"
                                label="
                            Sales Price" placeholder="Price">
                                <x-slot:suffix>
                                    <span class="btn btn-default">৳</span>
                                </x-slot:suffix></x-input.text-group>
                        </div>
                        <div class="mb-3 col-sm-12 col-lg-4">
                            <x-input.text wire:model="profit_margin"
                                label="
                            Sale Profit Margin"
                                placeholder="Sale Profit Margin" />
                        </div>

                    </div>
                </x-layouts.backend.card>

            </div>
            <div class="col-xl-4">
                <x-layouts.backend.card>
                    <x-slot:title>Status</x-slot:title>
                    <x-slot:button>
                        <div class="dropdown">
                            <x-button.default wire:click="storeProduct" class="btn-success">Save</x-button.default>
                            <x-button.default wire:click="storeProduct('new')" class="btn-success">Save &
                                New</x-button.default>
                            <a href="{{ route('backend.product.product_list') }}"
                                wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                        </div>
                    </x-slot:button>
                    <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>

                </x-layouts.backend.card>
                <x-layouts.backend.card>
                    <x-slot:title>Collection</x-slot:title>
                    <x-search.brands wire:model="brand_id" label="Product Brand" />

                    <x-input.select wire:model="unit_id" label="Product Unit">
                        @foreach ($unit as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                        @endforeach
                    </x-input.select>

                    <x-input.select wire:model="category_id" label="Product Category">
                        @foreach ($categories as $categories)
                            <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                        @endforeach
                    </x-input.select>
                </x-layouts.backend.card>

                <x-layouts.backend.card>
                    <x-slot:title>Note</x-slot:title>
                    <p>Easily manage your product catalog with our admin panel. <br><br> Add, edit, or remove products,
                        update
                        prices, and keep your inventory up to date. <br><br> Effortlessly showcase your products to your
                        customers.</p>

                </x-layouts.backend.card>
            </div>
        </div>
    </div>

</div>


@push('js')
    <script></script>
@endpush
