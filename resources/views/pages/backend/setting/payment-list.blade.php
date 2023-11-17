@push('css')
    <style>
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Payment Method List</x-slot:title>
        <x-slot:button>
            <a class="btn d-flex float-end btn-theme" x-data @click="$dispatch('openPaymentMethodModal')"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Payment</a>
        </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.payment-method-table />
    </x-layouts.backend.card>

    <x-modal id="paymentMethodModal">
        <x-slot:title>Payment Method Information</x-slot:title>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="code" label="Code" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="name" label="Name" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-search.ledger-accounts wire:model="ledger_account_id"
                    label="Ledger Acount" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text-group wire:model="opening_balance" label="Balance">
                    <x-slot:suffix>
                        <span class="btn btn-default price">৳</span>
                    </x-slot:suffix>
                </x-input.text-group></div>
            <div class="col-sm-12 col-md-6 col-lg-6"> <x-input.text wire:model="account_no" label="Account No" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"> <x-input.text wire:model="branch" label="Branch" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"> <x-input.select wire:model="status" label="Status"
                    :options="config('status.common')" /></div>
        </div>
        <x-slot:footer>
            <x-button.default wire:click="storeMethod" wire:target="storeMethod"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeMethod('new')" wire:target="storeMethod" class="btn-success">Save & New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
