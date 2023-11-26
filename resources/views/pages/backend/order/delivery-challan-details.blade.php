@push('css')
    <style>
        .note {
            padding-top: 0px !important;
        }
        .productSearch {
            border-radius: 18px;
            margin-left: 239px;
            width: 280px;
            font-size: 11px;
            color: #736d6d;
        }

        .btn-info {
            border-radius: 10px !important;
            margin-left: 147px;
            width: 90px;
            background-color: rgb(54, 129, 242);
            color: #fff;
        }

        .table>thead {
            vertical-align: bottom;
            background-color: #b0b4ef;
            font-size: 12px;
        }

        .table> :not(caption)>*>th {
            padding: .5rem .5rem;
            color: #3939a8;
        }

        .btn-info {
            border-radius: 10px !important;
            margin-left: 147px;
            width: 90px;
            background-color: rgb(54, 129, 242);
            color: #fff;
            margin-top: -55px;
        }

        .payment-info {
            padding-bottom: 40px;
        }

        .payment-table {
            margin-top: 30px;
        }

        .width {
            width: 80px;
            height: 21px;
        }

        .sl {
            width: 5px;
        }

        .ps-6 {
            padding-left: 3rem !important;
        }

        .product-item .card-body {
            padding: 0px;
        }

        .small {
            font-size: 10px;
        }

        .h-65px,
        .w-65px {
            height: 55px !important;
        }

        .product-item .table> :not(caption)>*>td {
            padding: .5rem .5rem 0 .5rem;
        }

        .table-sm> :not(caption)>*>* {
            padding: .1rem .25rem;

        }

        .mb-1 {
            margin-bottom: 2px;
        }

        .subtotal {
            font-weight: 700;
            color: #000 !important;
            margin-top: 5px;
            font-size: 12px;
        }

        .add-payment {
            margin-bottom: 20px;
            border-radius: 7px;
            margin-right: 22px;
            margin-top: -12px;
        }

        .border {
            border: 1px solid #736d6d;
            background-color: #736d6d;
        }

        b,
        strong {
            font-weight: 700;
        }

        .net-amount {
            background-color: #cbccdb;
            padding: 10px;
            border-radius: 15px;
            padding: 5px 10px;
            margin-right: 50px;
        }

        .net-amount .sm {
            font-size: 14px;
            padding-bottom: 5px;
        }

        .net-amount .value {
            background-color: #91caf4;
            padding: 0px 10px 2px;
            font-weight: 700;
            font-size: 20px;
            display: inline;
            border-radius: 15px;
            margin-top: 2px !important;
        }

        .shadow {
            box-shadow: 0 .1rem 1rem rgba(var(--bs-black-rgb), .15) !important;
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
                    <x-layouts.backend.card class="product-item">
                        <x-slot:title>Products (2)</x-slot:title>
                        <x-slot:search>
                            <x-search.products wire:model='product_id' class="productSearch"
                                placeholder="Search Product Name" />
                        </x-slot:search>

                        <x-slot:button>
                            <x-button.default type="button" class="btn btn-sm rounded btn-info" x-data @click="$dispatch('openProductModal')">Add
                                Product</x-button.default>
                        </x-slot:button>

                        <table class="table table-striped table-hover">
                            <thead>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th class="width text-center">Sale Price</th>
                                <th class="width text-center">Quantity</th>
                                <th class="width text-center">Discount</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr class="shadow-none">
                                    <td class="text-center">1</td>

                                    <td class="d-flex text-left">
                                        <div class="flex-1 ">
                                            <div><a href="#" class="text-decoration-none text-body">Suscipit sunt
                                                    sed provident</a>
                                            </div>
                                            <div class="text-body text-opacity-50 small ">
                                                SKU: IP14PROMAX-512
                                            </div>
                                            <div class="text-body text-opacity-50 small">
                                                Stock : 0; Delivery product : 0
                                            </div>
                                        </div>
                                    </td>
                                    <td><x-input.text-order wire:model="amount" class="widthtd" placeholder="" /></td>
                                    <td><x-input.text-order wire:model="quantity" class="widthtd" placeholder="" /></td>
                                    <td class="text-center"><x-input.text-order wire:model="discount" class="widthtd"
                                            placeholder="" />
                                    </td>
                                    <td class="text-center">
                                        0
                                    </td>
                                    <td> <a wire:click="delete()"
                                            wire:navigate="true"class="btn btn-danger btn-sm rounded"><i
                                                class="fa fa-close"></i></a></td>

                                </tr>

                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>
                {{-- <div class="col-lg-6 charges">
                    <x-layouts.backend.card class="shadow">
                         <div class="row mb-1">
                            <div class="col-7">Discount</div>
                            <div class="col-5 text-end"><b>200.00 ৳</b></div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-7">Tax</div>
                            <div class="col-5 text-end"><b>0.00 ৳</b></div>
                        </div>
                        <div class="row">
                            <div class="col-7">Shipping Charge</div>
                            <div class="col-5 text-end"><b>0.00 ৳</b></div>
                        </div>
                    </x-layouts.backend.card>
                </div> --}}
                {{-- <div class="col-lg-6">
                    <x-layouts.backend.card class="shadow">
                        <table class="table table-borderless table-sm m-0">
                            <tbody>
                                <tr class="mb-1">
                                    <td class="w-150px">Subtotal</td>
                                    <td></td>
                                    <td class="text-end"><b>3,496.00 ৳</b></td>
                                </tr>--}}
                                {{-- <tr>
                                    <td colspan="3">
                                        <hr class="mt-2 mb-2">
                                    </td>
                                </tr> --}}
                                {{-- <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td class="text-end text-decoration-underline"><b>3670.80 ৳</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td class="text-end  text-decoration-underline"><b>00.80 ৳</b></td>
                                </tr>

                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>  --}}
            </div>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Action</x-slot:title>
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
                <x-input.text wire:model="code" label="Code" />
                <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
            </x-layouts.backend.card>

            <x-layouts.backend.card>
                <x-slot:title>Delivery Man Info</x-slot:title>
                    <x-input.text wire:model="person_name" label="Delivery Man Name" placeholder="Name" />
                    <x-input.text wire:model="mobile" label="Mobile" placeholder="Mobile" />
                    <x-input.text wire:model="vehicle_type" label="Vehicle Type/No" />
                    <x-input.textarea wire:model="note" label="Add Note" />
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
