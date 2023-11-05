@push('css')
    <style>
        .caret{
            display: none;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Multiple Payment List</x-slot:title>
    <x-slot:button>
            <a href="{{ route('backend.setting.multiple_payment_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> Add Multiple Payment</a>
                </x-slot:button>
    </div>


    <x-layouts.backend.card>
    </x-layouts.backend.card>
</div>
