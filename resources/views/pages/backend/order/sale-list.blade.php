<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Sale list
        </x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.order.sale_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw me-1"></i> New Sale</a>

    </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.order.datatable.sale-table />
    </x-layouts.backend.card>
</div>
