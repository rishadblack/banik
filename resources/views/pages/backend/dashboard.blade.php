@push('css')
<style>
    .report p{
        margin-bottom: 5px!important;
    }
    h4 i{
        color: #111c43;
        margin-right: 5px;
        font-size: 17px!important;
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
</div>
