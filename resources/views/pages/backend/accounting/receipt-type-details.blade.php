@push('css')
    <style>
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $receiptType_id ? 'Update' : 'Create' }} Receipt Type</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Receipt Type Information</x-slot:title>
                <div class="row">
                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="flow_type" label="Flow[DR/CR]">
                            <option value="1">Debit</option>
                            <option value="2">Credit</option>
                        </x-input.select>
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeReceiptType" wire:target="storeReceiptType"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeReceiptType('new')" wire:target="storeReceiptType"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.accounting.receipt_type_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Efficiently managing your receipt types is crucial for keeping track of your small business expenses. <br><br>
                    Our accounting software allows you to easily categorize and organize various types of receipts,
                    making it a breeze to maintain financial records. <br><br>Keep a comprehensive record of all receipt-related activities for transparency and compliance.</p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
