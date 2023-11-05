@push('css')
    <style>
        h6 {
            border-bottom: 2px dotted #9f9e9e;
            display: inline-block;
        }
        .amount-body{
            padding-bottom: 40px;
        }

        .amount-body .row {
            height: 50px;
        }

        .amount-body .row span {
            word-spacing: 14px;
            font-size: 12px;
        }

        .amount-body p {
            font-size: 20px;
            font-weight: 600;
        }
        .amount-btn button{
            border:none;
            margin-top: 20px;
            margin-left: 20px;
            color: #6e6c6c;
        }

        hr {
            margin-top: 10px;
            color: #847979;
        }

        .blue-hr {
            color: #002db5;
            height: 5px;
        }
    </style>
@endpush
<div>
    <x-layouts.backend.card>
        <x-slot:title>Inventory Dashboard</x-slot:title>
        <x-slot:button>
            <div class="dropdown">
                <x-button.default wire:click="storeInventory"
                    class="btn-success">{{ $dashboard_id ? 'Update' : 'Create' }}</x-button.default>
                <x-button.default wire:click="storeInventory('new')" class="btn-success">Save &
                    New</x-button.default>

            </div>
        </x-slot:button>
        <div class="row">
            <div class="col-4">
                <x-input.select wire:model="outlet" label="Outlets" placeholder="Select Outlet">
                    <option value="sonargau">Sonargau</option>
                    <option value="paltan">Paltan</option>
                </x-input.select>
            </div>
            <div class="col-4">
                <x-input.select wire:model="outlet" label="Outlets" placeholder="Select Outlet">
                    <option value="sonargau">Sonargau</option>
                    <option value="paltan">Paltan</option>
                </x-input.select>
            </div>
            <div class="col-4">
                <x-input.text wire:model="reference" label="Reference" placeholder="Reference" />
            </div>
        </div>
    </x-layouts.backend.card>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Amount</x-slot:title>
                <h6>Total Amount </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Purchase</x-slot:title>
                <h6>Total Purchase </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Sale</x-slot:title>
                <h6>Total Sale </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Amount</x-slot:title>
                <h6>Total amount </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Amount</x-slot:title>
                <h6>Total amount </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Amount</x-slot:title>
                <h6>Total amount </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4">
            <x-layouts.backend.card>
                <x-slot:title>Amount</x-slot:title>
                <h6>Total amount </h6>
                <div class="amount-body">
                    <p>৳ 0.00 -</p>

                    <div class="row">
                        <div class="col-3">BDT10</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT5</div>
                        <div class="col-9">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">BDT0</div>
                        <div class="col-9">
                            <hr class="blue-hr">
                            <span>12:00AM 6:00AM 12:00PM 6:00PM</span>
                            <div class="amount-btn d-flex float-end">
                                <button>- Oct 28, 2023</button>
                                <button>- Oct 27, 2023</button>
                            </div>
                        </div>
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>

    </div>

</div>
