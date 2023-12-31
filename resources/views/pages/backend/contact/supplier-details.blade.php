<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $supplier_id ? 'Update' : 'Create' }} Supplier</x-slot:title>
    </div>
    <div class="row gx-4" x-data="{ loginAccess: false, defaultCustomer: false }">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Supplier Information</x-slot:title>
                <div class="row gx-4">
                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="code" label="Code" />
                    </div>
                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="mobile" label="Mobile" />
                    </div>
                </div>
                <div class="row gx-4">
                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="company_name" label="Company name" />
                    </div>
                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="opening_balance" label="Opening Balance" />
                    </div>

                    <div class="col-sm-6 col-md-4 col-md-4">
                        <x-input.text wire:model="credit_limit" label="Credit Limit" />
                    </div>
                    <div class="col-sm-6 col-md-6 col-md-6"><x-input.text wire:model="address" label="Address" /></div>

                </div>

            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Supplier Address</x-slot:title>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-4"><x-input.select wire:model="country_id" label="Country">
                            @foreach ($country as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"> <x-input.select wire:model="division_id" label="Division">
                            <option value=""></option>
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"> <x-input.select wire:model="district_id" label="District">
                            <option value=""></option>
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"><x-input.select wire:model="thana_id" label="Upzila">
                            <option value=""></option>
                        </x-input.select></div>

                    <div class="col-sm-6 col-md-4 col-md-4"> <x-input.text wire:model="postcode"
                            label="Postcode/Zipcode" />
                    </div>
                </div>
            </x-layouts.backend.card>

        </div>

        <div class="col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Action</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeSupplier" wire:target="storeSupplier"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeSupplier('new')" wire:target="storeSupplier" class="btn-success">Save &
                            New</x-button.default>
                        <a href="{{ route('backend.contact.supplier_list') }}"
                            wire:navigate="true"class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.select wire:model="status" label="Status" :options="config('status.common')"/>


            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Collection</x-slot:title>
                <x-input.select wire:model="contact_group_id" label="Group Name">
                    @foreach ($group as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </x-input.select>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <p>Simplify your supply chain management. <br><br> Manage supplier details, track order history, and ensure
                    consistent and reliable product sourcing. <br><br> Strengthen your supplier relationships and
                    enhance product availability. <br> Add Product to supply</p>
            </x-layouts.backend.card>

        </div>
    </div>
