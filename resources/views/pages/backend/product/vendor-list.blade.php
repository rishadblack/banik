
@push('css')
    <style>

    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Brand List</x-slot:title>
        <x-slot:button>
            <a href="{{ route('backend.product.vendor_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Brand</a>
        </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.product.datatable.brand-table />
    </x-layouts.backend.card>
</div>
