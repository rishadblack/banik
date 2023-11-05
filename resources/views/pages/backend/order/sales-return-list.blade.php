<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Sales Return
            <a href="{{route('backend.order.salesreturn_details')}}" wire:navigate class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw me-1"></i> New Sales Return</a>
        </x-slot:title>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.order.datatable.sales-return-table />
    </x-layouts.backend.card>
</div>
