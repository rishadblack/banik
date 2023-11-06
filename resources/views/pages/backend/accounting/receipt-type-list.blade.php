@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Receipt Type</x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.accounting.receipt_type_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Receipt Type</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.accounting.datatable.receipt-type-table/>
    </x-layouts.backend.card>
</div>
