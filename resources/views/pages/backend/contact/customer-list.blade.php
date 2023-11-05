<div>
    <div class="d-flex align-items-center justify-space-between mb-3 mt-3">
        <x-slot:title>Customer List</x-slot:title>
        <x-slot:button><a href="{{ route('backend.contact.customer_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle mt-1 fa-fw me-1"></i> Add
                Customer</a></x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.contact.datatable.customer-table />
    </x-layouts.backend.card>
</div>
