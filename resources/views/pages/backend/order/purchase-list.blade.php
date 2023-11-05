<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Purchase</x-slot:title>
        <x-slot:button>
            <a href="{{route('backend.order.purchase_details')}}" wire:navigate class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> New Purchase</a>
        </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.order.datatable.purchase-table />
    </x-layouts.backend.card>
</div>
