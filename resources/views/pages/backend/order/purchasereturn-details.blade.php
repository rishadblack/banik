@push('css')
    <style>
        .productSearch {
            border-radius: 18px;
            margin-left: 239px;
            width: 280px;
            font-size: 11px;
            color: #736d6d;
            height: 30px !important;
        }

        .ts-control {
            height: 32px !important;
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
            width: 110px;
            height: 21px;
        }

        .charges .widthtd {
            margin-bottom: 5px;
        }

        .sub-width {
            width: 54px;
        }

        .stock {
            width: 80px !important;
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

        b,
        strong {
            font-weight: 700;
        }

        .net-amount {
            background-color: #cbccdb;
            padding: 10px;
            border-radius: 15px;
            padding: 5px 10px;
            margin-right: 0px;
            width: 225px;
        }

        .net-amount .sm {
            font-size: 14px;
            padding-bottom: 5px;
        }

        .net-amount .value {
            background-color: #91caf4;
            padding: 0px 3px 2px;
            margin-left: 5px;
            font-weight: 700;
            font-size: 20px;
            display: inline;
            border-radius: 15px;
            margin-top: 2px !important;
        }

        .shadow {
            box-shadow: 0 .1rem 1rem rgba(var(--bs-black-rgb), .15) !important;
        }
        .table>thead {
            background-color: #acacde;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $preturn_id ? 'Update' : 'Create' }} Purchase Return</x-slot:title>
    </div>

    <div class="row gx-4">
        <div class="col-xl-8">
            <div class="row">
                <div class="col-12">
                    <x-layouts.backend.card class="product-item">
                        <x-slot:title>Products (2)</x-slot:title>
                        <x-slot:search>
                            <x-search.products wire:model.live='search_product' class="productSearch" placeholder="Search Product Name" />
                        </x-slot:search>

                        {{-- <x-slot:button>
                            <x-button.default type="button" class="btn btn-sm rounded btn-info" x-data @click="$dispatch('openProductModal')">Add
                                Product</x-button.default>
                        </x-slot:button> --}}


                        <table class="table table-striped ">
                            <thead>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th class="width text-center">Purchase Price</th>
                                <th class="width text-center">Quantity</th>
                                <th class="width text-center">Discount</th>
                                <th class="text-center">Subtotal</th>
                                <th class="text-end">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($item_rows as $item_row)

                                <tr class="shadow-none" wire:key="product-{{$item_row}}">
                                    <td class="text-center">{{ $loop->iteration}}</td>

                                    <td class="d-flex text-left">
                                        <div class="flex-1 ">
                                            <div><a href="#" class="text-decoration-none text-body">{{ $item_name[$item_row]}}</a>
                                            </div>
                                            <div class="text-body text-opacity-50 small ">
                                                SKU: {{ $item_code[$item_row]}}
                                            </div>
                                            <div class="text-body text-opacity-50 small">
                                                Stock : 0; Delivery product : 0
                                            </div>
                                        </div>
                                    </td>
                                    <td><x-input.text-order wire:model.live.debounce.500ms="item_price.{{$item_row}}" class="widthtd" placeholder="" /></td>
                                    <td><x-input.text-order wire:model.live.debounce.500ms="item_quantity.{{$item_row}}" class="widthtd" placeholder="" /></td>
                                    <td class="text-center"><x-input.text-order wire:model.live.debounce.500ms="item_discount.{{$item_row}}" class="widthtd" placeholder="" />
                                    </td>
                                    <td class="text-center">
                                        {{ numberFormat($item_subtotal[$item_row], true) }}
                                    </td>
                                    <td> <button wire:click="removeItem('{{ $item_row }}')" class="btn btn-danger btn-sm rounded" style="float:right"><i class="fa fa-close"></i></button></td>

                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Data Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>

                <div class="col-lg-7 charges">
                    <x-layouts.backend.card class="shadow">
                        <div class="row mb-1">
                            <div class="col-8">Discount</div>
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms="discount_amount"
                                    class="widthtd"
                                    placeholder="">{{ numberFormat($discount_amount, true) }}</x-input.text-order>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-8">Vat</div>
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms="vat_amount"
                                    class="widthtd" placeholder=""></x-input.text-order></div>
                        </div>
                        <div class="row">
                            <div class="col-8">Delivery Charge</div>
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms="shipping_charge"
                                    class="widthtd" placeholder=""></x-input.text-order></div>
                        </div>
                    </x-layouts.backend.card>
                </div>
                <div class="col-lg-5">
                    <x-layouts.backend.card class="shadow">
                        <table class="table table-borderless table-sm m-0">
                            <tbody>
                                <tr class="mb-1">
                                    <td class="w-150px">Subtotal</td>
                                    <td></td>
                                    <td class="text-end"><b>{{numberFormat($subtotal,true)}}</b></td>
                                </tr>
                                {{-- <tr>
                                    <td colspan="3">
                                        <hr class="mt-2 mb-2">
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td class="text-end text-decoration-underline"><b>{{numberFormat($net_amount,true)}}</b></td>
                                </tr>
                                {{-- <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td class="text-end  text-decoration-underline"><b>00.80 ৳</b></td>
                                </tr> --}}

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
                <x-search.suppliers wire:model="contact_id" label="Search Supplier" />

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Outlet & Warehouse</x-slot:title>
                <x-search.outlets wire:model="outlet_id" label="Outlets"/>
                <x-search.warehouses wire:model="warehouse_id" label="Warehouse"/>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Status</x-slot:title>
                <x-input.select wire:model="payment_status" label="Payment Status" :options="config('status.payment_status')"/>
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
