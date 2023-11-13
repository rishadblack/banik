<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Ledger Account List</x-slot:title>
        <x-slot:button>
            <x-button.default class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#addNew">
                <i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> New Ledger Account</x-button.default>
        </x-slot:button>
    </div>

    <x-layouts.backend.card  x-data="{ open: false }">
        <livewire:backend.accounting.datatable.ledger-account-table />
    </x-layouts.backend.card>

    <x-modal id="addNew">
        <x-layouts.backend.card>
            <x-slot:title>Ledger Account</x-slot:title>
            <x-input.text wire:model="ledger_code" label="Code" />
            <x-input.text wire:model="name" label="Name" />
            <x-input.select wire:model="chart_of_account_id" label="Chart Of account">
                @foreach ($chart as $chart)
                    <option value="{{ $chart->id }}">{{ $chart->name }}</option>
                @endforeach
            </x-input.select>
            {{-- <x-input.select wire:model="status" label="Status" :options="config('status.common')"/> --}}
            <div class="float-end mt-3">
                <x-button.default wire:click="storeLedgerAccount" wire:target="storeLedgerAccount"
                    class="btn-success">Save</x-button.default>
                <x-button.default wire:click="storeLedgerAccount('new')" wire:target="storeLedgerAccount"
                    class="btn-success">Save &
                    New
                </x-button.default>
            </div>
        </x-layouts.backend.card>
    </x-modal>
</div>
