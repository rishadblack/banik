@push('css')
    <style>

    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Delivery Challan List</x-slot:title>
        <x-slot:button>
            <a href="{{ route('backend.order.delivery_challan_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Delivery
                Challan</a>
        </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.order.datatable.delivery-challan-table />
    </x-layouts.backend.card>
</div>
