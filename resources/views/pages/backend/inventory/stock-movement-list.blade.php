<div>
    <div class="d-flex align-items-center">

        <x-slot:title>Stock Transfer </x-slot:title>
        <x-slot:button>
            <a href="{{ route('backend.inventory.stock_movement_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> New Stock Transfer</a>

        </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.inventory.datatable.stock-transfer-table />
    </x-layouts.backend.card>
</div>
