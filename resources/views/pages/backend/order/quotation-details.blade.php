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

        .table {
            margin-top: 5px;
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
            width: 150px;
        }

        .widthtd {
            width: 80px;
        }

        .sl {
            width: 8px;
        }

        .ps-6 {
            padding-left: 3rem !important;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Quotation Details</x-slot:title>
    </div>

    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Products (2)</x-slot:title>
                <x-slot:search>
                    <x-input.select class="productSearch" placeholder="Search Product Name">

                    </x-input.select>
                </x-slot:search>

                <x-slot:button>
                    <x-button.default type="button" class="btn btn-sm rounded btn-info"
                        wire:click="openProductAddModal">Add
                        Product</x-button.default>
                </x-slot:button>


                <table class="table table-striped">
                    <thead>
                        <th class="sl">SL</th>
                        <th class="text-center">Product Name</th>
                        <th>Purchase Price</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td class="d-flex">
                                <div
                                    class="h-65px w-65px d-flex align-items-center position-relative bg-body rounded p-2">
                                    <img src="{{ asset('backend/assets/img/product/product-2.png') }}" alt
                                        class="mw-100 mh-100">
                                    <span
                                        class="w-20px h-20px p-0 d-flex align-items-center justify-content-center badge bg-theme text-theme-color position-absolute end-0 top-0 fw-bold fs-12px rounded-pill mt-n2 me-n2">1</span>
                                </div>
                                <div class="ps-6 flex-1">
                                    <div><a href="#" class="text-decoration-none text-body">iPhone 14 Pro Max</a>
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        SKU: IP14PROMAX-512
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        Stock : 0
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        Receive product : 0
                                    </div>
                                </div>
                            </td>
                            <td><x-input.text wide:model="amount" class="widthtd" placeholder="" /></td>
                            <td><x-input.text wide:model="quantity" class="widthtd" placeholder="" /></td>
                            <td><x-input.text wide:model="discount" class="widthtd" placeholder="" />
                                <div class="text-body text-opacity-50 small d-flex float-end mt-20px">
                                    Subtotal : 0
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td class="d-flex">
                                <div
                                    class="h-65px w-65px d-flex align-items-center justify-content-center position-relative bg-body rounded p-2">
                                    <img src="{{ asset('backend/assets/img/product/product-1-thumb.png') }}" alt
                                        class="mw-100 mh-100">
                                    <span
                                        class="w-20px h-20px p-0 d-flex align-items-center justify-content-center badge bg-theme text-theme-color position-absolute end-0 top-0 fw-bold fs-12px rounded-pill mt-n2 me-n2">1</span>
                                </div>
                                <div class="ps-6 flex-1">
                                    <div><a href="#" class="text-decoration-none text-body">iPhone 12 Pro Max</a>
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        SKU: IPYTFHJAX-656
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        Stock : 0
                                    </div>
                                    <div class="text-body text-opacity-50 small">
                                        Receive product : 0
                                    </div>
                                </div>
                            </td>
                            <td><x-input.text wide:model="amount" class="widthtd" placeholder="" /></td>
                            <td><x-input.text wide:model="quantity" class="widthtd" placeholder="" /></td>
                            <td><x-input.text wide:model="discount" class="widthtd" placeholder="" />
                                <div class="text-body text-opacity-50 small d-flex float-end mt-20px">
                                    Subtotal : 0
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Payment Records</x-slot:title>
                <x-slot:button>
                    <a href="#" class="ms-auto text-decoration-none fs-13px text-body text-opacity-50"><i
                            class="fab fa-paypal me-1 fa-lg"></i> View paypal records</a>
                </x-slot:button>
                <table class="table table-borderless table-sm m-0">
                    <tbody>
                        <tr>
                            <td class="w-150px">Subtotal</td>
                            <td>3 items</td>
                            <td class="text-end">$3,496.00</td>
                        </tr>
                        <tr>
                            <td class="w-150px">Discount</td>
                            <td><x-input.text wide:model="discount" class="width" placeholder="" /></td>
                            <td class="text-end">$3,496.00</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>GST 5%</td>
                            <td class="text-end">$174.80</td>
                        </tr>
                        <tr>
                            <td class="w-150px">Additional Charge</td>
                            <td><x-input.text wide:model="additional_charge" class="width" placeholder="" /></td>
                            <td class="text-end">$3,496.00</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <hr class="m-0">
                            </td>
                        </tr>
                        <tr>
                            <td class="pb-2" colspan="2"><b>Total</b></td>
                            <td class="text-end pb-2 text-decoration-underline"><b>$3670.80</b></td>
                        </tr>
                        <tr>
                            <td class="pb-2" colspan="2"><b>Total Payment</b></td>
                            <td class="text-end pb-2 text-decoration-underline"><b>$3670.80</b></td>
                        </tr>
                        <tr>
                            <td class="pb-2" colspan="2"><b>Due</b></td>
                            <td class="text-end pb-2 text-decoration-underline"><b>$00.80</b></td>
                        </tr>

                    </tbody>
                </table>
            </x-layouts.backend.card>
            <x-layouts.backend.card class="payment-info">
                <x-slot:title>Payment Info</x-slot:title>
                <div class="row ">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.select wire:model="payment_method_id" label="Payment Method">
                            <option value="1">BKash</option>
                            <option value="2">Rocket</option>
                            <option value="3">Bank</option>
                            <option value="4">Nagad</option>
                        </x-input.select>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text-group wire:model="paid_amount" label="Amount">
                            <x-slot:suffix>
                                <span class="btn btn-default price">৳</span>
                            </x-slot:suffix>
                        </x-input.text-group>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="additional_charge" label="Charge" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="ref" label="Reference" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.date wire:model="payment_date" label="Date" />
                    </div>
                </div>

                <table class="table table-striped payment-table">
                    <thead>
                        <th>SL</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Charge</th>
                        <th>Date</th>

                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($order as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td class="py-1 align-middle">
                                    @if ($order->payment_method_id == 1)
                                        <span
                                            class="badge bg-teal text-teal-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                                class="fa fa-circle text-teal fs-9px fa-fw me-5px"></i>BKash</span>
                                    @elseif ($order->payment_method_id == 2)
                                        <span
                                            class="badge bg-orange text-orange-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                                class="fa fa-circle text-orange fs-9px fa-fw me-5px"></i>Rocket</span>
                                    @elseif ($order->payment_method_id == 3)
                                        <span
                                            class="badge bg-primary text-primary-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                                class="fa fa-circle text-primary fs-9px fa-fw me-5px"></i> Bank</span>
                                    @elseif ($order->payment_method_id == 4)
                                        <span
                                            class="badge bg-success text-success-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                                class="fa fa-circle text-success fs-9px fa-fw me-5px"></i> Nagad</span>
                                    @endif

                                </td>
                                <td>{{ $order->paid_amount }}</td>
                                <td>{{ $order->additional_charge }}</td>
                                <td>{{ $order->payment_date }}</td>
                                <td> <a href="#" wire:navigate="true"class="btn btn-danger btn-sm rounded"><i
                                            class="fa fa-close"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </x-layouts.backend.card>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Quotation Info</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeQuotation" wire:target="storeQuotation"
                            class="btn-success">{{ $quotation_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeQuotation('new')" wire:target="storeQuotation"
                            class="btn-success">Save
                            & New
                        </x-button.default>
                        <a href="{{ route('backend.order.quotation_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model="code" label="Code" />
                <x-input.select wire:model="contact_id" label="Search Customer">
                    @foreach ($customer as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->code }}</option>
                    @endforeach
                </x-input.select>
                <x-input.select wire:model="outlet_id" label="Outlets">
                    <option value="1">Sonargau</option>
                    <option value="2">Paltan</option>
                </x-input.select>
                <x-input.select wire:model="warehouse_id" label="Warehouse">
                    <option value="1">Sonargau</option>
                    <option value="2">Paltan</option>
                </x-input.select>
                <x-input.text wire:model="ref" label="Reference" />
                <x-input.text wire:model="delivery_quantity" label="Delivery Quantity" />
                <x-input.text wire:model="sales_person" label="Sales Person" />
                <x-input.text-group wire:model="delivery_charge" label="Additional/Delivery Charge">
                    <x-slot:suffix>
                        <span class="btn btn-default price">৳</span>
                    </x-slot:suffix>
                </x-input.text-group>
                <x-input.text-group wire:model="discount" label="Discount">
                    <x-slot:suffix>
                        <span class="btn btn-default price">৳</span>
                    </x-slot:suffix>
                </x-input.text-group>
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
