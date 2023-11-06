@push('css')
    <style>
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Accounting Receipt </x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.accounting.accounting_receipt_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Account Receipt</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.accounting-receipt-table/>
    </x-layouts.backend.card>
</div>
