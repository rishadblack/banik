@push('css')
    <style>
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

        .product-search {
            background-color: #fff;
        }

        .modal-dialog {
            max-width: 740px;
            margin-right: auto;
            margin-left: auto;
        }

        .table>thead {
            background-color: #acacde;
        }

        .table> :not(caption)>*>th {
            padding: .5rem .5rem;
            color: #3939a8;
            font-size: 13px;
        }

        .product select {
            word-wrap: normal;
            padding: 7px 11px;
            background-color: #fff;
            border: 1px solid #9f9e9e;
            border-radius: 10px;
        }

        .btn-info {
            background-color: rgb(54, 129, 242);
            color: #fff;
            margin-left: 10px;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center">
        <x-slot:title>Sale list</x-slot:title>
        <x-slot:button>
            <a href="{{ route('backend.order.sale_details') }}" wire:navigate class="btn d-flex float-end btn-theme"><i
                    class="fa fa-plus-circle fa-fw mt-1 me-1"></i> New Sale</a>

        </x-slot:button>
    </div>

    <x-layouts.backend.card class="text-center">
        <livewire:backend.order.datatable.sale-table />
    </x-layouts.backend.card>

    <x-modal id="deliveryModal">
        <x-slot:title>Delivery Info</x-slot:title>
        <div class="row">
            <div class="col-4">
                <x-input.text wire:model="code" label="Code" />
            </div>
            <div class="col-4">
                <x-search.products wire:model="product_id" label="Product Name" />
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
        <hr class="mt-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 product d-flex mt-2 mb-2">
                <x-search.products wire:model='product_id' class="productSearch" placeholder="Search Product Name" />
                <x-button.default type="button" class="btn btn-sm rounded btn-info" x-data
                    @click="$dispatch('openProductModal')">Add
                    Product</x-button.default>
            </div>
            <div class="col-2"></div>
        </div>
        <table class="table table-striped table-hover shadow">
            <thead>
                <th>SL</th>
                <th>Product Name</th>
                <th class="width text-center">Order Quantity</th>
                <th class="width text-center">Delivery Quantity</th>
                <th class="width text-center">Total Quantity</th>
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
                    <td class="text-center"><x-input.text-order wire:model="discount" class="widthtd" placeholder="" />
                    </td>
                    <td class="text-center">
                        0
                    </td>
                    <td> <a wire:click="delete()" wire:navigate="true"class="btn btn-danger btn-sm rounded"><i
                                class="fa fa-close"></i></a></td>
                </tr>
            </tbody>
        </table>
        <x-slot:footer>
            <x-button.default wire:click="storeDelivery" wire:target="storeDelivery"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="storeDelivery('new')" wire:target="storeDelivery" class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
    <x-modal id="paymentModal">
        <x-slot:title>Payment Info</x-slot:title>
        <div class="row ">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.text wire:model="code" label="Code" />
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.select wire:model="payment_method_id" label="Payment Method">
                    <option value="1">BKash</option>
                    <option value="2">Rocket</option>
                    <option value="3">Bank</option>
                    <option value="4">Nagad</option>
                </x-input.select>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.text wire:model="ref" label="Reference" />
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.date wire:model="txn_date" label="Date" placeholder="Enter Date" />
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.text-group wire:model="net_amount" label="Amount">
                    <x-slot:suffix>
                        <span class="btn btn-default price">৳</span>
                    </x-slot:suffix>
                </x-input.text-group>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <x-input.text wire:model="charge" label="Charge" />
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="mt-3 mt-4 float-end fs-4 net-amount text-center shadow"><span class="sm">Net
                        Amount</span><span class="value"> $0.00</span></div>
            </div>
        </div>
        <hr class="mt-4 mb-4">
        <table class="table table-striped payment-table shadow">
            <thead>
                <th>SL</th>
                <th>Payment Method</th>
                <th>Amount</th>
                <th>Charge</th>
                <th>Date</th>

                <th>Action</th>
            </thead>
            <tbody>

                @foreach ($transaction as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td class="py-1 align-middle">
                            @if ($transaction->payment_method_id == 1)
                                <span
                                    class="badge bg-teal text-teal-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                        class="fa fa-circle text-teal fs-9px fa-fw me-5px"></i>BKash</span>
                            @elseif ($transaction->payment_method_id == 2)
                                <span
                                    class="badge bg-orange text-orange-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                        class="fa fa-circle text-orange fs-9px fa-fw me-5px"></i>Rocket</span>
                            @elseif ($transaction->payment_method_id == 3)
                                <span
                                    class="badge bg-primary text-primary-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                        class="fa fa-circle text-primary fs-9px fa-fw me-5px"></i> Bank</i>
                                @elseif ($transaction->payment_method_id == 4)
                                    <span
                                        class="badge bg-success text-success-800 bg-opacity-25 px-2 pt-5px pb-5px rounded fs-12px d-inline-flex align-items-center"><i
                                            class="fa fa-circle text-success fs-9px fa-fw me-5px"></i>
                                        Nagad</span>
                            @endif

                        </td>
                        <td>{{ $transaction->net_amount }}</td>
                        <td>{{ $transaction->charge }}</td>
                        <td>{{ $transaction->txn_date }}</td>
                        <td> <a wire:click="delete({{ $transaction->id }})"
                                wire:navigate="true"class="btn btn-danger btn-sm rounded"><i
                                    class="fa fa-close"></i></a></td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <x-slot:footer>
            <x-button.default wire:click="addPayment" wire:target="addPayment"
                class="btn-success">Save</x-button.default>
            <x-button.default wire:click="addPayment('new')" wire:target="addPayment" class="btn-success">Save &
                New
            </x-button.default>
        </x-slot:footer>
    </x-modal>
</div>
