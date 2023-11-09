@push('css')
    <style>
        .form-switch {
            padding-left: 3.8em;
            padding-top: 8px;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Group</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>

                <x-slot:title>Group Information</x-slot:title>

                <div class="row gx-4">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <x-input.text wire:model="name" label="Group Name" />
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeGroup" wire:target="storeGroup"
                            class="btn-success">{{ $group_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeGroup('new')" wire:target="storeGroup"
                            class="btn-success">Save
                            & New
                        </x-button.default>
                        <a href="{{ route('backend.contact.group_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Contact groups in a SaaS application allow users to organize their contacts into specific categories
                    or lists. <br><br> These groups make it easier to manage, communicate, and share information with
                    multiple
                    individuals at once. <br><br> For example, in a business context, you might create contact groups
                    for
                    different departments (e.g., "Sales," "Marketing," "Support"), project teams, or even specific
                    events or campaigns.</p>
            </x-layouts.backend.card>
        </div>
    </div>
