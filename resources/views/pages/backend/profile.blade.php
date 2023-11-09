<div>
    <x-slot:title>Profile Update</x-slot:title>
    <div class="row">
        <div class="col-sm-12 col-lg-8 col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Personal Details</x-slot:title>

                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="name" label="Name" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="email" label="Email" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="phone" label="Phone" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="street" label="Street" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="city" label="City" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="postal_code" label="Postal code" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.text wire:model="state" label="State" />
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <x-input.select wire:model="country" label="Country" :options="config('status.country')" />
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="row">
                            <div class="col-sm-12 col-lg-9">
                                <x-input.file wire:model="profile_image" label="Profile Picture" size="1020KB" />
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <div class="d-flex align-items-center py-2 float-end">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $profile_image ? $profile_image->temporaryUrl() : $profile_image_preview ?? '' }} "
                                            width="75px" height="75px" alt="..." />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 mt-5">
                        <x-button.default wire:click="storeProfileUpdate" wire:target="storeProfileUpdate"
                            class="btn btn-lg btn-theme float-end">Update</x-button.default>
                    </div>
                </div>

            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-lg-4 col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <p>Personal Information: Update your name, contact details, and other personal information. <br><br>
                    Profile Image: Change your profile picture to personalize your account.<br><br>
                    By using the Admin Profile Edit, you can maintain an organized and secure admin account, making it
                    easier to oversee your software's operations.</p>
            </x-layouts.backend.card>
        </div>
        {{-- <div class="col-lg-12 col-xl-12">
            <x-layouts.backend.card>
                <x-slot:title>Password Change</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">

                        <x-button.default wire:click="storePasswordChange" wire:target="storePasswordChange"
                            class="btn-success">Update</x-button.default>
                        <a href="{{ route('backend.dashboard') }}" wire:navigate="true"class="btn-sm btn btn-danger rounded">Close</a>
                    </div>
                </x-slot:button>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="current_password" label="Current Password" />
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="password" label="New Password" />
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="password_confirmation" label="Confirm New Password" />
                    </div>
                </div>
            </x-layouts.backend.card>
        </div> --}}
    </div>
</div>
