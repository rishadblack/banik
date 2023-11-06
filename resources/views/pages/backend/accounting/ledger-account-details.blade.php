@push('css')
    <style>

    </style>
@endpush
<div>
    <x-slot:title>Ledger Account Details</x-slot:title>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Ledger Account Information</x-slot:title>
                <div class="row">
                    <div class="col-4">
                        <x-input.text wire:model="ledger_code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="chart_of_account_id" label="Chart Of account">
                            @foreach ($chart as $chart)
                                <option value="{{$chart->id}}">{{$chart->name}}</option>
                            @endforeach
                        </x-input.select>
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Ledger Account</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeLedgerAccount" wire:target="storeLedgerAccount"
                            class="btn-success">{{ $ledger_account_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeLedgerAccount('new')" wire:target="storeLedgerAccount"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.accounting.ledger_account_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Your ledger accounts are at the heart of your business's financial information. <br><br> Proper management and
                    reconciliation are essential for maintaining financial health. <br><br> Our small business
                    accounting software offers a user-friendly way to handle ledger accounts.</p>
            </x-layouts.backend.card>
        </div>


    </div>
</div>
