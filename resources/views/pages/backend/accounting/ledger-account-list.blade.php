<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Ledger Account List</x-slot:title>
        <x-slot:button><a href="{{ route('backend.accounting.ledger_account_details') }}" wire:navigate
                    class="btn btn-theme"><i class="fa fa-plus-circle fa-fw mt-1 me-1"></i> New Ledger Account</a>
                </x-slot:button>
    </div>

    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.ledger-account-table />
    </x-layouts.backend.card>
</div>
