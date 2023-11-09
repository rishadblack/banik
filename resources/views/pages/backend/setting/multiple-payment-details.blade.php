@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{$multi_payment_id ? 'Update' : 'Create'}} Multiple Payment</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Multiple Payment Information</x-slot:title>
                <div class="row">

                    <div class="col-4">
                        <x-input.text wire:model="code" label="Transaction Code" />
                    </div>
                    <div class="col-4">
                        <x-input.select wire:model="payment_method_id" label="Payment Method">
                            @foreach ($payment as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                            @endforeach
                        </x-input.select>
                    </div>
                    <div class="col-4">
                        <x-input.text-group wire:model="charge" label="Charge">
                            <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                        </x-input.text-group>
                    </div>
                </div>
                <div class="row">

                    <div class="col-4">
                        <x-input.text-group wire:model="net_amount" label="Net Amount">
                            <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                        </x-input.text-group>
                    </div>
                    <div class="col-4">

                    </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeMultiplePayment" wire:target="storeMultiplePayment"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeMultiplePayment('new')" wire:target="storeMultiplePayment"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.multiple_payment_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Our small business accounting software offers a variety of payment options to make financial
                    transactions as convenient as possible for you. <br><br>
                    Payment Gateways: Seamlessly integrate with popular payment gateways, allowing you to accept
                    payments from your customers with ease. <br><br>
                    Multiple Payment Methods: Provide your customers with various payment methods, including credit
                    cards, bank transfers, and more.
                </p>
                <x-input.textarea wire:model="note" label="Remark" />
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Status</x-slot:title>
                <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>
            </x-layouts.backend.card>


        </div>


    </div>
</div>
