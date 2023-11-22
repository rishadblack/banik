@push('css')
    <style>
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
            width: 54px;
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
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $purchase_id ? 'Update' : 'Create' }} Purchase Return</x-slot:title>
    </div>

    <div class="row gx-4">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <x-layouts.backend.card class="product-item">
                        <x-slot:title>Products (2)</x-slot:title>
                        <x-slot:search>
                            <x-search.products wire:model='product_id' class="productSearch" placeholder="Search Product Name" />
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
                                <th class="widthtd">Purchase Price</th>
                                <th class="widthtd">Quantity</th>
                                <th class="widthtd">Discount</th>
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
                                    <td><x-input.text-order wire:model="amount" class="widthtd" placeholder="" /></td>
                                    <td><x-input.text-order wire:model="quantity" class="widthtd" placeholder="" /></td>
                                    <td class="text-center"><x-input.text-order wire:model="discount" class="widthtd"
                                            placeholder="" />
                                        <div class="text-body text-opacity-50 small d-flex float-end subtotal">
                                            Subtotal : 0
                                        </div>
                                    </td>

                                </tr>


                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>
                {{-- <div class="col-7">
                    <x-layouts.backend.card>
                        <x-slot:title>Supplier</x-slot:title>
                        <x-input.text wire:model="contact_id" class="form-control-sm" label="Discount"/>
                        <x-input.text wire:model="contact_id" class="form-control-sm" label="Additional Charge"/>
                    </x-layouts.backend.card>
                </div> --}}
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
                                    <td>3 items</td>
                                    <td class="text-end">$3,496.00</td>
                                </tr>
                                <tr class="mb-1">
                                    <td class="w-150px">Discount</td>
                                    {{-- <td><x-input.text wide:model="discount" class="width" placeholder="" /></td> --}}
                                    <td></td>
                                    <td class="text-end">$3,496.00</td>
                                </tr>
                                <tr class="mb-1">
                                    <td>Tax</td>
                                    <td>GST 5%</td>
                                    <td class="text-end">$174.80</td>
                                </tr>
                                <tr class="mb-1">
                                    <td class="w-150px">Additional Charge</td>
                                    <td></td>
                                    {{-- <td><x-input.text wide:model="additional_charge" class="width" placeholder="" /></td> --}}
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
                <x-slot:title>Purchase Return</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storePurchase" wire:target="storePurchase"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storePurchase('new')" wire:target="storePurchase"
                            class="btn-success">Save
                            & New
                        </x-button.default>
                        <a href="{{ route('backend.order.purchase_return_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model="code" label="Code" />

                <x-input.text wire:model="purchase_return_ref" label="Reference" />

                {{-- <x-input.select wire:model="purchase_status" label="Purchase Status" :options="config('status.delivery_status')"/> --}}

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Supplier</x-slot:title>
                <x-search.suppliers wire:model="contact_id" label="Search Supplier"/>

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Outlet & Warehouse</x-slot:title>
                <x-input.select wire:model="outlet_id" label="Outlets">
                    @foreach ($outlet as $outlet)
                    <option value="{{$outlet->id}}">{{$outlet->name}}</option>
                    @endforeach
                </x-input.select>
                <x-input.select wire:model="warehouse_id" label="Warehouse">
                    @foreach ($warehouse as $warehouse)
                    <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                    @endforeach
                </x-input.select>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Status</x-slot:title>
                <x-input.select wire:model="payment_status" label="Payment Status">
                    <option value="1">Receipt</option>
                    <option value="2">Pending</option>
                    <option value="3">Hold</option>
                    <option value="4">Cancle</option>
                </x-input.select>
                <x-input.select wire:model="delivery_status" label="Delivery Status">
                    <option value="1">Receipt</option>
                    <option value="2">Pending</option>
                    <option value="3">Hold</option>
                    <option value="4">Cancle</option>
                </x-input.select>
            </x-layouts.backend.card>

        </div>

    </div>
</div>
