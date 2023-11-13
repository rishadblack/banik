@push('css')
    <style>
        .note {
            padding-top: 0px !important;
        }
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $challan_id ? 'Update' : 'Create' }} Delivery Challan</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <x-layouts.backend.card>
                        <x-slot:title>Delivery Challan Information</x-slot:title>
                        <div class="row">

                            <div class="col-4">
                                <x-input.text wire:model="code" label="Code" />
                            </div>
                            <div class="col-4">
                                <x-input.text wire:model="product_name" label="Product Name" />
                            </div>
                            <div class="col-4">
                                <x-input.text wire:model="quantity" label="Quantity" />
                            </div>
                            <div class="col-4">
                                <x-input.text wire:model="person_name" label="Delivery Man Name" placeholder="Name" />
                            </div>
                            <div class="col-4">
                                <x-input.text wire:model="mobile" label="Mobile" placeholder="Mobile" />
                            </div>
                            <div class="col-4">
                                <x-input.text wire:model="vehicle_type" label="Vehicle Type/No" />
                            </div>
                            <div class="col-6">
                                <x-input.textarea wire:model="note" label="Add Note" />
                            </div>

                        </div>
                    </x-layouts.backend.card>
                </div>

            </div>


        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Status</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeDelivery" wire:target="storeDelivery"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeDelivery('new')" wire:target="storeDelivery"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.order.delivery_challan_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
            </x-layouts.backend.card>

            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <p>Create delivery challans in an easy way. <br><br> Verify delivery man information, order details, and
                    schedule
                    deliveries efficiently with records of every delivery. <br><br> Stay in control of your supply
                    chain, ensuring
                    accurate and on-time deliveries to enhance customer satisfaction and streamline operations.</p>
            </x-layouts.backend.card>


        </div>


    </div>
</div>
