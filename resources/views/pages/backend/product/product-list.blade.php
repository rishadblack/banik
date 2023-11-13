<div>
    <x-slot:title>Product List</x-slot:title>
    <x-slot:button>
        <a href="{{ route('backend.product.product_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Product</a>
    </x-slot:button>

    <x-layouts.backend.card>
        <livewire:backend.product.datatable.product-table />
    </x-layouts.backend.card>
</div>
