@push('css')
    <style>
        .caret {
            display: none;
        }
    </style>
@endpush
<div>
        <x-slot:title>Chart of Account</x-slot:title>
        <x-slot:button>
            <x-button.default class="btn d-flex float-end btn-theme" x-data
                @click="$dispatch('openChartOfAccountModal')"><i class="fa fa-plus-circle fa-fw mt-1 mt-1 me-1"></i> Add
                Chart Of Account</x-button.default>
        </x-slot:button>


    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.chart-of-account-table />
    </x-layouts.backend.card>

    <x-modal id="chartModal">
        <x-slot:title>Chart Of Account </x-slot:title>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="code" label="Code" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.text wire:model="name" label="Name" /></div>
            <div class="col-sm-12 col-md-6 col-lg-6"><x-input.select wire:model="status" label="Status" :options="config('status.common')" /></div>
        </div>
        <x-slot:footer>
            <x-button.default wire:click="storeChartOfAccount" wire:target="storeChartOfAccount"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeChartOfAccount('new')" wire:target="storeChartOfAccount"
                class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
