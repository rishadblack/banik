@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Chart of Account</x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.accounting.chart_account_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 mt-1 me-1"></i> Add Chart Of Account</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.chart-of-account-table/>
    </x-layouts.backend.card>
</div>
