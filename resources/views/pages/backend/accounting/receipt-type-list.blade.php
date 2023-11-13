@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Receipt Type</x-slot:title>
    <x-slot:button>
            <x-button.default data-bs-toggle="modal" data-bs-target="#addNew" class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Receipt Type</x-button.default>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.receipt-type-table/>
    </x-layouts.backend.card>

    <x-modal id="addNew">
        <x-layouts.backend.card>
            <x-slot:title>Receipt Type</x-slot:title>
            <x-input.text wire:model="name" label="Name" />
            <x-input.text wire:model="code" label="Code" />
                <x-input.select wire:model="flow_type" label="Flow[DR/CR]">
                    <option value="1">Debit</option>
                    <option value="2">Credit</option>
                </x-input.select>
            <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>
            <div class="float-end mt-3">
                <x-button.default wire:click="storeReceiptType" wire:target="storeReceiptType"
                    class="btn-success">Save</x-button.default>
                <x-button.default wire:click="storeReceiptType('new')" wire:target="storeReceiptType" class="btn-success">Save &
                    New
                </x-button.default>
            </div>
        </x-layouts.backend.card>
    </x-modal>
</div>
