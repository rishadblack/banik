@push('css')
    <style>
    </style>
@endpush


<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{$warehouse_id ? 'Update' : 'Create'}} Warehouse</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Warehouse Information</x-slot:title>
                <div class="row">
                    <div class="col-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                    <div class="col-4">
                        <x-input.text wire:model="address" label="Address" />
                    </div>
                </div>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Address</x-slot:title>
                <div class="row">

                    <div class="col-sm-6 col-md-4 col-md-4"><x-input.select wire:model="country_id" label="Country">
                        @foreach ($country as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </x-input.select></div>
                <div class="col-sm-6 col-md-4 col-md-4">
                    <x-input.select wire:model="division_id" label="Division">
                        @foreach ($division as $division)
                            <option value="{{ $division->id }}">{{ $division->name }}</option>
                        @endforeach
                    </x-input.select>
                </div>
                <div class="col-sm-6 col-md-4 col-md-4">
                    <x-input.select wire:model="district_id" label="District">
                        @foreach ($district as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </x-input.select>
                </div>
                <div class="col-sm-6 col-md-4 col-md-4">
                    <x-input.select wire:model="upazila_id" label="Thana/Upazila">
                        @foreach ($thana as $thana)
                            <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                        @endforeach
                    </x-input.select>
                </div>

                <div class="col-sm-6 col-md-4 col-md-4"> <x-input.text wire:model="postcode"
                        label="Postcode/Zipcode" />
                </div>
                </div>
            </x-layouts.backend.card>

        </div>
        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Address</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeWarehouse" wire:target="storeWarehouse"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeWarehouse('new')" wire:target="storeWarehouse"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.warehouse_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <p>Multi-Warehouse Support: Configure and manage settings for multiple warehouses from a centralized dashboard. <br><br>
                    Inventory Control: Define inventory categories and customize stock management settings for each warehouse. <br><br>
                    Access Permissions: Control access to warehouse settings, ensuring that the right team members have the appropriate access.</p>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Status</x-slot:title>
                <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
