@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $accountingreceipt_id ? 'Update' : 'Create' }} Accounting Receipt</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Accounting Receipt Information</x-slot:title>
                <div class="row">
                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="ledger_account_id" label="Ledger Account">
                            @foreach ($ledger as $ledger)
                                <option value="{{ $ledger->id }}">{{ $ledger->name }}</option>
                            @endforeach
                        </x-input.select>
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="flow_type" label="Flow Type">
                            <option value="1">Debit</option>
                            <option value="2">Credit</option>
                        </x-input.select>
                    </div>
                    <div class="col-4">
                        <x-search.customers wire:model="contact_id" label="Search Customer"/>
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="receipt_type_id" label="Receipt Type">
                            @foreach ($receiptType as $receiptType)
                                <option value="{{ $receiptType->id }}">{{ $receiptType->name }}</option>
                            @endforeach
                        </x-input.select>
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Payment Info</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeReceipt" wire:target="storeReceipt"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeReceipt('new')" wire:target="storeReceipt"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.accounting.accounting_receipt_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.select wire:model="payment_method_id" label="Payment Method">
                    @foreach ($payment as $payment)
                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                @endforeach
                </x-input.select>
                <x-input.text-group wire:model="amount" label="Amount">
                    <x-slot:suffix>
                        <span class="btn btn-default price">৳</span>
                    </x-slot:suffix>
                </x-input.text-group>

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Remarks</x-slot:title>
                <x-input.textarea wire:model="note" label="Remarks" />
            </x-layouts.backend.card>

        </div>


    </div>
</div>
