<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Groups</x-slot:title>
        <x-slot:button><x-button.default class="btn d-flex float-end btn-theme" x-data
                @click="$dispatch('openGroupModal')"><i class="fa fa-plus-circle mt-1 fa-fw me-1"></i> Add
                Group</x-button.default></x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.contact.datatable.group-table />
    </x-layouts.backend.card>
    <x-modal id="groupModal">
        <x-slot:title>Unit Information</x-slot:title>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="name" label="Group Name" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.select wire:model="status" label="Status"
                    :options="config('status.common')" /></div>
        </div>
        <x-slot:footer>
            <x-button.default wire:click="storeGroup" wire:target="storeGroup"
                class="btn-success">{{ $group_id ? 'Update' : 'Create' }}</x-button.default>
            <x-button.default wire:click="storeGroup('new')" wire:target="storeGroup" class="btn-success">Save
                & New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
