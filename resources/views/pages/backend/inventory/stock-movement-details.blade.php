@push('css')
    <style>
        .gap {
            margin-top: 20px;
        }

        .gap2 {
            padding: 20px;
        }

        .tracking {
            color: #706d6d;
        }

        .tracking:hover {
            color: #989494;
        }

        .productSearch {
            border-radius: 20px;
            margin-left: 239px;
            padding: 5px 13px;
            width: 150px;
            font-size: 10px;
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
            margin-top: 25px;
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
        }

        .p-detail {
            padding: 0px 40px;
        }

        .purchase-payment {
            background-color: #dedfee;
            padding: 10px;
            border-radius: 15px;
            padding-bottom: 15px;
            margin-right: 60px;
            margin-left: 30px;
        }

        .purchase-payment1 {
            background-color: #dedfee;
            padding: 10px;
            border-radius: 15px;
            margin-right: 60px;
        }

        .purchase-payment2 {
            background-color: #dedfee;
            ;
            padding: 10px;
            border-radius: 15px;
        }

        .purchase-payment p {
            background-color: #b3b6ed;
            ;
            padding: 5px 10px;
            font-weight: 700;
            font-size: 12px;
            display: inline;
            border-radius: 15px;
            margin-top: 20px;
        }

        .purchase-payment1 p {
            background-color: #f89ecd;
            padding: 5px 10px;
            font-weight: 700;
            font-size: 12px;
            display: inline;
            border-radius: 15px;
            margin-top: 20px;
        }

        .purchase-payment2 p {
            background-color: rgb(245, 158, 134);
            padding: 5px 10px;
            font-weight: 700;
            font-size: 12px;
            display: inline;
            border-radius: 15px;
            margin-top: 20px;
        }


        .payment-gallery {
            margin-bottom: 30px;

        }

        .payment-info {
            padding-bottom: 40px;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>Stock Movement Details</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">

            <x-layouts.backend.card class="payment-info">

                <x-slot:title>Stock Movement Item</x-slot:title>
                <div class="row ">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="product_code" label="Product Code" />
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="product_name" label="Product Name" />
                    </div>

                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <x-input.text wire:model="quantity" label="Quantity" />
                    </div>

                </div>
                <table class="table table-striped">
                    <thead>
                        <th>SL</th>
                        <th>Product code</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </x-layouts.backend.card>
        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Stock Movement</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeStockTransfer"
                            class="btn-success">{{ $stocktransfer_id ? 'Update' : 'Create' }}</x-button.default>
                        <x-button.default wire:click="storeStockTransfer('new')" class="btn-success">Save &
                            New</x-button.default>
                        <a href="{{ route('backend.inventory.stock_movement_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.text wire:model.live="stock_adjustment_code" label="Code" />
                <x-input.select wire:model="from_warehouse" label="From Warehouse">
                    <option value="1">Sonargau</option>
                    <option value="2">Paltan</option>
                </x-input.select>
                <x-input.select wire:model="to_warehouse" label="To Warehouse">
                    <option value="1">Sonargau</option>
                    <option value="2">Paltan</option>
                </x-input.select>

                <x-input.text wire:model="ref" label="Reference" />
            </x-layouts.backend.card>


        </div>


    </div>
</div>
