@push('css')
    <style>
        .form-check {
            margin-top: 10px;
        }
    </style>
@endpush
<div>
    <div class="d-flex align-items-center mb-3">
        <x-slot:title>{{ $outlet_id ? 'Update' : 'Create' }} Outlet</x-slot:title>
    </div>
    <div class="row gx-4">
        <div class="col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Outlet Information</x-slot:title>
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
                <x-slot:title>Status</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">
                        <x-button.default wire:click="storeOutlet" wire:target="storeOutlet"
                            class="btn-success">Save</x-button.default>
                        <x-button.default wire:click="storeOutlet('new')" wire:target="storeOutlet"
                            class="btn-success">Save & New
                        </x-button.default>
                        <a href="{{ route('backend.setting.outlet_list') }}" wire:navigate
                            class="btn btn-danger btn-sm rounded">Close</a>
                    </div>
                </x-slot:button>
                <x-input.select wire:model="status" label="Status" :options="config('status.common')" />
            </x-layouts.backend.card>

            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <p>Multi-Location Configuration: Configure settings for multiple outlets, ensuring each location
                    operates according to its unique requirements. <br><br>
                    Access Control: Define user access permissions for each outlet to enhance security and manage roles
                    effectively. <br><br>
                    Outlet Information: Input and edit vital information, such as address, contact details, and
                    operating hours.</p>
            </x-layouts.backend.card>

        </div>


    </div>
</div>
