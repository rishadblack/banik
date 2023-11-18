<div>
    <div class="d-flex align-items-center">
        <x-slot:title>{{ $customer_id ? 'Update' : 'Create' }} Customer</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>

                <x-slot:title>Customer Information</x-slot:title>
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
                    <div class="col-sm-6 col-md-6 col-md-6">
                        <x-input.text wire:model="address" label="Address" />
                    </div>
                </div>
            </x-layouts.backend.card>
            <x-layouts.backend.card>
                <x-slot:title>Customer Address</x-slot:title>
                <div class="row">

                    <div class="col-sm-6 col-md-4 col-md-4"><x-input.select wire:model="country_id" label="Country">
                            @foreach ($country as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"> <x-input.select wire:model="division_id" label="Division">
                            <option value="1">Dhaka</option>
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"> <x-input.select wire:model="district_id" label="District">
                            <option value="1">Dhaka</option>
                        </x-input.select></div>
                    <div class="col-sm-6 col-md-4 col-md-4"><x-input.select wire:model="thana_id" label="Upzila">
                            <option value="1">Dhaka</option>
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
                        <x-button.default wire:click="storeCustomer" wire:target="storeCustomer" class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeCustomer('new')" wire:target="storeCustomer" class="btn-success">Save &
                            New</x-button.default>
                        <a href="{{ route('backend.contact.customer_list') }}"
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
                <p>Empower your customer relationship management with our admin panel. <br><br> Maintain updated
                    customer
                    profiles, monitor their order history. <br><br> Offer tailored services to build loyalty and drive
                    repeat
                    business.</p>
            </x-layouts.backend.card>
        </div>
    </div>
