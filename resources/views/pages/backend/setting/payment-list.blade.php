@push('css')
    <style>
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Payment Method List</x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.setting.payment_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Payment</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
        <livewire:backend.setting.datatable.payment-method-table />
    </x-layouts.backend.card>
</div>
