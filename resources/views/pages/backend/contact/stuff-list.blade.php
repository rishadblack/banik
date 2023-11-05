<div>
    <div class="d-flex align-items-center justify-space-between mb-3 mt-3">
        <x-slot:title>Stuff List</x-slot:title>
        <x-slot:button><a href="{{ route('backend.contact.stuff_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle mt-1 fa-fw mt-1 me-1"></i> Add
                Stuff</a></x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.contact.datatable.stuff-table />
    </x-layouts.backend.card>
</div>
