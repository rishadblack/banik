@push('css')
    <style>
        .report p {
            margin-bottom: 5px !important;
        }

        h4 i {
            color: #0c41ff;
            margin-right: 5px;
            font-size: 17px !important;
        }

        .amount-body {
            padding-bottom: 20px;
        }

        .amount-body .row {
            height: 40px;
        }

        .amount-body .row span {
            word-spacing: 14px;
            font-size: 12px;
        }

        .amount-body p {
            font-size: 12px;
            font-weight: 600;
            color: #847979;
        }

        .amount-btn button {
            border: none;
            margin-top: 20px;
            margin-left: 20px;
            color: #6e6c6c;
        }

        hr {
            margin-top: 10px;
            color: #847979;
        }

        .analysis .vl {
            width: 70px;
            height: 200px;
            border-right: 1px solid #c9c9c9;
        }

        .analysis {
            height: 200px;
            margin-top: 20px;
        }

        .day span {
            font-size: 12px;
            margin-left: 30px;
        }

        .amount-body .analysis .vl p {
            font-size: 12px !important;
            padding-left: 12px;
        }

        .amount-body h6 {
            margin-bottom: 0px;
        }
    </style>
@endpush

<div>
    <x-slot:title>Dashboard</x-slot:title>
    <div class="row">
        <div class="col-4">
            <x-input.select wire:model="branch_id" label="Branch">
                @foreach ($paymentmethod as $paymentmethod)
                    <option value="{{ $paymentmethod->id }}">{{ $paymentmethod->branch }}</option>
                @endforeach
            </x-input.select>
        </div>
        <div class="col-4">
            <x-input.select wire:model="warehouse_id" label="Warehouse">
                @foreach ($warehouse as $warehouse)
                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </x-input.select>
        </div>
        <div class="col-4">
            <x-input.date-range wire:model="" label="Data Range" />
        </div>
    </div>
    <div class="mt-3 report">
        <h4>Welcome {{ auth()->user()->name }}</h4>
        <div class="row">
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Total Sales</p>
                    <h4><i class="fa-solid fa-coins"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Total Collection</p>
                    <h4><i class="fa fa-usd"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Total Payment</p>
                    <h4><i class="fa-solid fa-money-check-dollar"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Cash in Hand</p>
                    <h4><i class="fa-solid fa-sack-dollar"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Total Receivable</p>
                    <h4><i class="fa-solid fa-money-bill-trend-up"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Total Payable</p>
                    <h4><i class="fa-solid fa-money-bill-transfer"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Current Stock</p>
                    <h4><i class="fa-solid fa-cubes"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
            <div class="col-3">
                <x-layouts.backend.card>
                    <p>Damage Stock</p>
                    <h4><i class="fa-solid fa-layer-group"></i>0.00 ৳</h4>
                </x-layouts.backend.card>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <x-layouts.backend.card class="amount-body">
                <div class="row">
                    <div class="col-7">
                        <h6>Sales chart </h6>
                        <p>(Amount in crore)</p>
                    </div>
                    <div class="col-5 d-flex">
                        <x-input.date-range wire:model="" placeholder="Select Data Range" />
                    </div>
                </div>
                <div class="analysis d-flex">
                    <div class="vl">
                        <p>10</p>
                        <p>8</p>
                        <p>6</p>
                        <p>4</p>
                        <p>2</p>
                        <p>0</p>
                    </div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                </div>
                <div class="day">
                    <span>Saturday</span><span>Sunday</span><span>Monday</span><span>Tuesday</span><span>Wednesday</span><span>Thursday</span><span>Friday</span>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <x-layouts.backend.card class="amount-body">
                <div class="row">
                    <div class="col-7">
                        <h6>Sales chart </h6>
                        <p>(Amount in crore)</p>
                    </div>
                    <div class="col-5 d-flex">
                        <x-input.date-range wire:model="" placeholder="Select Data Range" />
                    </div>
                </div>
                <div class="analysis d-flex">
                    <div class="vl">
                        <p>10</p>
                        <p>8</p>
                        <p>6</p>
                        <p>4</p>
                        <p>2</p>
                        <p>0</p>
                    </div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                    <div class="vl"></div>
                </div>
                <div class="day">
                    <span>Saturday</span><span>Sunday</span><span>Monday</span><span>Tuesday</span><span>Wednesday</span><span>Thursday</span><span>Friday</span>
                </div>
            </x-layouts.backend.card>
        </div>
    </div>
</div>
