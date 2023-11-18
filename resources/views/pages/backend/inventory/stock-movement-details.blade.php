@push('css')
    <style>
        .productSearch {
            border-radius: 18px;
            margin-left: 239px;
            width: 240px;
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
            padding: 0px 34px;
            margin-right: 50px;
            padding-bottom: 9px;
        }

        .net-amount .sm {
            font-size: 14px;
        }

        .net-amount .value {
            background-color: #91caf4;
            padding: 0px 10px;
            font-weight: 700;
            font-size: 20px;
            display: inline;
            border-radius: 15px;
            margin-top: 20px;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $stocktransfer_id ? 'Update' : 'Create' }} Stock Transfer</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <x-layouts.backend.card class="product-item">
                        <x-slot:title>Products (2)</x-slot:title>
                        <x-slot:search>
                            <x-input.select class="productSearch" placeholder="Search Product Name">

                            </x-input.select>
                        </x-slot:search>

                        <x-slot:button>
                            <x-button.default type="button" class="btn btn-sm rounded btn-info" data-bs-toggle="modal"
                                data-bs-target="#openProductAddModal">Add
                                Product</x-button.default>
                        </x-slot:button>


                        <table class="table table-striped ">
                            <thead class="text-center">
                                <th class="sl">SL</th>
                                <th class="text-center">Product Name</th>
                                {{-- <th class="widthtd">Purchase Price</th> --}}
                                <th class="widthtd">Quantity</th>
                                {{-- <th class="widthtd">Discount</th> --}}
                            </thead>
                            <tbody>
                                <tr class="shadow-none">
                                    <td class="text-center">1</td>
                                    <td class="d-flex">
                                        <div
                                            class="h-65px w-65px d-flex align-items-center position-relative bg-body rounded p-2">
                                            <img src="{{ asset('backend/assets/img/product/product-2.png') }}" alt
                                                class="mw-100 mh-100">
                                            <span
                                                class="w-20px h-20px p-0 d-flex align-items-center justify-content-center badge bg-theme text-theme-color position-absolute end-0 top-0 fw-bold fs-12px rounded-pill mt-n2 me-n2">1</span>
                                        </div>
                                        <div class="ps-6 flex-1 ">
                                            <div><a href="#" class="text-decoration-none text-body">iPhone 14 Pro
                                                    Max</a>
                                            </div>
                                            <div class="text-body text-opacity-50 small ">
                                                SKU: IP14PROMAX-512
                                            </div>
                                            <div class="text-body text-opacity-50 small">
                                                Stock : 0 , Receive product : 0
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td><x-input.text-order wire:model="amount" class="widthtd" placeholder="" /></td> --}}
                                    <td><x-input.text-order wire:model="quantity" class="widthtd" placeholder="" />
                                        <div class="text-body text-opacity-50 small d-flex float-end subtotal">
                                            Subtotal : 0
                                        </div>
                                    </td>
                                    {{-- <td class="text-center"><x-input.text-order wire:model="discount" class="widthtd"
                                            placeholder="" />
                                        <div class="text-body text-opacity-50 small d-flex float-end subtotal">
                                            Subtotal : 0
                                        </div>
                                    </td> --}}

                                </tr>
                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>

                <div class="col-lg-5 offset-lg-7">
                    <x-layouts.backend.card>
                        {{-- <x-slot:title>Payment Records</x-slot:title> --}}
                        <x-slot:button>
                            <a href="#" class="ms-auto text-decoration-none fs-13px text-body text-opacity-50"><i
                                    class="fab fa-paypal me-1 fa-lg"></i> View paypal records</a>
                        </x-slot:button>
                        <table class="table table-borderless table-sm m-0">
                            <tbody>
                                <tr class="mb-1">
                                    <td class="w-150px">Subtotal</td>
                                    <td></td>
                                    <td class="text-end">$3,496.00</td>
                                </tr>
                                <tr class="mb-1">
                                    <td class="w-150px">Discount</td>
                                    {{-- <td><x-input.text wire:model="discount" class="width" placeholder="" /></td> --}}
                                    <td></td>
                                    <td class="text-end">$3,496.00</td>
                                </tr>
                                <tr class="mb-1">
                                    <td>Tax</td>
                                    <td></td>
                                    <td class="text-end">$174.80</td>
                                </tr>
                                <tr class="mb-1">
                                    <td class="w-150px">Additional Charge</td>
                                    <td></td>
                                    {{-- <td><x-input.text wire:model="additional_charge" class="width" placeholder="" /></td> --}}
                                    <td class="text-end">$3,496.00</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <hr class="mt-2 mb-2">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td class="text-end text-decoration-underline"><b>$3670.80</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Total Payment</b></td>
                                    <td class="text-end  text-decoration-underline"><b>$3670.80</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td class="text-end  text-decoration-underline"><b>$00.80</b></td>
                                </tr>

                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Stock Transfer</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeStockTransfer" class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeStockTransfer('new')" class="btn-success">Save &
                            New</x-button.default>
                        <a href="{{ route('backend.inventory.stock_movement_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model.live="code" label="Code" />
                <x-input.select wire:model="warehouse_id" label=" From Warehouse">
                    @foreach ($warehouse as $warehouse)
                    <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                    @endforeach
                </x-input.select>
                <x-input.select wire:model="to_warehouse_id" label="To Warehouse">
                    <option value="1">Sonargau</option>
                    <option value="2">Paltan</option>
                </x-input.select>

                <x-input.text wire:model="ref" label="Reference" />
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
            <p>Optimize your stock distribution with the Stock Transfer page. <br><br> Easily transfer goods between locations,
                track the movement of inventory, and maintain balanced stock levels. <br><br> Streamline your supply chain and
                ensure products are where they need to be for efficient order fulfillment.</p>
            </x-layouts.backend.card>


        </div>


    </div>
</div>
