@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Accounting Receipt</x-slot:title>
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
                        <x-input.text wire:model="ledger_account_id" label="Ledger Account" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="flow" label="Flow Type" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="name" label="Stuff/Supplier/Customer" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="receipt_type" label="Receipt Type">
                            <option value="1">Payment</option>
                            <option value="2">Receive</option>
                            <option value="3">Expenses</option>
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
                        <x-button.default wire:click="storeCategory" wire:target="storeCategory"
                            class="btn-success">{{ $accountingreceipt_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeCategory('new')" wire:target="storeCategory"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.accounting.accounting_receipt_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.select wire:model="payment_method_id" label="Payment Method" />
                <x-input.text-group wire:model="name" label="Amount">
                    <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                </x-input.text-group>

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Remarks</x-slot:title>
                <x-input.textarea wire:model="remark" label="Remarks" />
            </x-layouts.backend.card>

        </div>


    </div>
</div>
