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
        .sm {
            font-size: 12;
        }

        .smvalue {
            font-weight: 600;
            font-size: 17px;
        }

        .shadow {
            box-shadow: 0 .1rem 1rem rgba(var(--bs-black-rgb), .15) !important;
        }
        .btn-warning{
            background-color: var(--bs-btn-hover-bg);
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $sale_id ? 'Update' : 'Create' }} Sale</x-slot:title>
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
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms="discount"
                                    class="widthtd"
                                    placeholder=""><b>{{ numberFormat($discount, true) }}</b></x-input.text-order>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-8">Tax</div>
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms=""
                                    class="widthtd" placeholder=""><b>0</b></x-input.text-order></div>
                        </div>
                        <div class="row">
                            <div class="col-8">Shipping Charge</div>
                            <div class="col-4 text-end"><x-input.text-order wire:model.live.debounce.500ms=""
                                    class="widthtd" placeholder=""><b>0</b></x-input.text-order></div>
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
                                    <td class="text-end"><b>{{ numberFormat($subtotal, true) }}</b></td>
                                </tr>
                                {{-- <tr>
                                    <td colspan="3">
                                        <hr class="mt-2 mb-2">
                                    </td>
                                </tr> --}}
                                <tr>
                                    <td colspan="2"><b>Total</b></td>
                                    <td class="text-end text-decoration-underline">
                                        <b>{{ numberFormat($net_amount, true) }}</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Paid Amount</b></td>
                                    <td class="text-end  text-decoration-underline">
                                        <b>{{ numberFormat($paid_amount, true) }}</b></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Due</b></td>
                                    <td class="text-end  text-decoration-underline">
                                        <b>{{ numberFormat($due_amount, true) }}</b></td>
                                </tr>

                            </tbody>
                        </table>
                    </x-layouts.backend.card>
                </div>
            </div>

            <x-layouts.backend.card class="payment-info">
                <x-slot:title>Payment Info</x-slot:title>
                <x-slot:button>
                    <x-button.default wire:click='addPayment' class="btn btn-sm btn-theme"> Add
                        Payment</x-button.default>
                    <x-button.default wire:click="addPayment" class="btn btn-sm btn-danger"> Reset</x-button.default>
                </x-slot:button>
                <div class="row ">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-search.payment-methods wire:model="payment_method_id" label="Payment Method" />
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="payment_ref" label="Reference" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.date wire:model="txn_date" label="Date" placeholder="Enter Date" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text-group wire:model.live.debounce.500ms="payment_amount" label="Amount">
                            <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                        </x-input.text-group>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model.live.debounce.500ms="payment_charge" label="Charge" />
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="mt-3 mt-4 float-end form-control text-center shadow">
                            <span class="sm">Net Amount</span>
                            <span class="smvalue"> {{ numberFormat($payment_net_amount, true) }}</span>
                        </div>
                    </div>

                </div>

                <table class="table table-striped payment-table shadow">
                    <thead>
                        <th>SL</th>
                        <th>Payment Method</th>
                        <th>Ref</th>
                        <th>Amount</th>
                        <th>Date</th>

                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($payment_item_rows as $key => $payment_item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="py-1 align-middle">{{ $payment_item['payment_method_name'] }}

                                </td>
                                <td>{{ $payment_item['payment_ref'] }}</td>
                                <td>{{ numberFormat($payment_item['payment_net_amount'], true) }}</td>
                                <td>{{ $payment_item['txn_date'] }}</td>
                                <td> <button wire:click="removePaymentItem('{{ $key }}')"
                                        class="btn btn-danger btn-sm rounded" style="float:right">
                                        <i class="fa fa-close"></i></button>
                                </td>

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
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Sale Info</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeSale" wire:target="storeSale"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeSale('new')" wire:target="storeSale"
                            class="btn-success">Save
                            & New
                        </x-button.default>
                        {{-- <a href="{{ route('invoice.sales',['id' => $order->id ? null]) }}"
                            wire:navigate="true" class="btn btn-warning btn-sm rounded">Print</a> --}}

                        <a href="{{ route('backend.order.sale_list') }}"
                            wire:navigate="true" class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model="code" label="Code" />
                <x-input.text wire:model="ref" label="Reference" />

                <x-input.text wire:model="sales_person" label="Sales Person" />

            </x-layouts.backend.card>

            <x-layouts.backend.card>
                <x-slot:title>Customer</x-slot:title>
                <x-search.customers wire:model="contact_id" label="Search Customer" />
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Outlet & Warehouse</x-slot:title>
                <x-input.select wire:model="outlet_id" label="Outlet">
                    @foreach ($outlet as $outlet)
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                    @endforeach
                </x-input.select>
                <x-input.select wire:model="warehouse_id" label="Warehouse">
                    @foreach ($warehouse as $warehouse)
                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
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

    <x-modal id="productModal">

    </x-modal>

</div>
