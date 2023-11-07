<div>
    <div class="d-flex align-items-center">

        <x-slot:title>Stock Adjustment </x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.inventory.stock_adjustment_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> New Stock
                Adjustment</a>
            </x-slot:button>

    </div>

    <x-layouts.backend.card>
        <livewire:backend.inventory.datatable.stock-adjustment-table />
    </x-layouts.backend.card>
</div>
