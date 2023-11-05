<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Supplier</x-slot:title>
        <x-slot:button><a href="{{ route('backend.contact.supplier_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add
                Supplier</a></x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.contact.datatable.supplier-table />
    </x-layouts.backend.card>
</div>
