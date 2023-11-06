@push('css')
    <style>
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Create/Update Payment Method</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Payment Method Information</x-slot:title>
                <div class="row">

                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="ledger_account_id" label="Ledger Acount">

                        </x-input.select>
                    </div>
                </div>
                <div class="row">

                    <div class="col-4">
                        <x-input.text-group wire:model="opening_balance" label="Balance">
                            <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                        </x-input.text-group>
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="account_no" label="Account No" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="branch" label="Branch" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeMethod" wire:target="storeMethod"
                            class="btn-success">{{ $payment_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeMethod('new')" wire:target="storeMethod"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.payment_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Our small business accounting software offers a variety of payment options to make financial
                    transactions as convenient as possible for you. <br><br> We understand that flexibility is crucial
                    when it
                    comes to managing your business's finances. <br><br>

                    Payment Gateways: Seamlessly integrate with popular payment gateways, allowing you to accept
                    payments from your customers with ease. <br><br>
                    Multiple Payment Methods: Provide your customers with various payment methods, including credit
                    cards, bank transfers, and more.
                </p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
