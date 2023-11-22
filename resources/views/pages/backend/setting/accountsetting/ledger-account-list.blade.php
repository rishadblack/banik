<div>
    <x-slot:title>Ledger Account List</x-slot:title>
    <x-slot:button>
        <x-button.default class="btn btn-theme" x-data @click="$dispatch('openLedgerAccountModal')">
            <i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> New Ledger Account</x-button.default>
    </x-slot:button>

    <x-layouts.backend.card>
        <livewire:backend.setting.accountsetting.datatable.ledger-account-table />
    </x-layouts.backend.card>

    <x-modal id="ledgerModal">
        <x-slot:title>Ledger Account</x-slot:title>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="ledger_code" label="Code" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"> <x-input.text wire:model="name" label="Name" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.select wire:model="chart_of_account_id"
                    label="Chart Of account">
                    @foreach ($chart as $chart)
                        <option value="{{ $chart->id }}">{{ $chart->name }}</option>
                    @endforeach
                </x-input.select></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.select wire:model="status" label="Status"
                    :options="config('status.common')" />
            </div>
        </div>

        <x-slot:footer>
            <x-button.default wire:click="storeLedgerAccount" wire:target="storeLedgerAccount"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeLedgerAccount('new')" wire:target="storeLedgerAccount"
                class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
