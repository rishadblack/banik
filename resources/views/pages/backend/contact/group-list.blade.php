<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Groups</x-slot:title>
        <x-slot:button><a href="{{ route('backend.contact.group_details') }}" wire:navigate
                class="btn d-flex float-end btn-theme"><i class="fa fa-plus-circle mt-1 fa-fw me-1"></i> Add Group</a></x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.contact.datatable.group-table />
    </x-layouts.backend.card>
</div>
