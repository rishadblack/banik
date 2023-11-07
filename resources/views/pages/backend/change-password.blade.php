<div>
    <x-slot:title>Profile Update</x-slot:title>
    <div class="row">
        <div class="col-sm-12 col-lg-8 col-xl-8">
            <x-layouts.backend.card>
                <x-slot:title>Password Change</x-slot:title>
                <x-slot:button>
                    <div class="dropdown">

                        <x-button.default wire:click="storePasswordChange" wire:target="storePasswordChange"
                            class="btn-success">Update</x-button.default>
                        <a href="{{ route('backend.dashboard') }}"
                            wire:navigate="true"class="btn-sm btn btn-danger rounded">Close</a>
                    </div>
                </x-slot:button>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="current_password" label="Current Password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="password" label="New Password" />
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <x-input.password wire:model.lazy="password_confirmation" label="Confirm New Password" />
                    </div>
                </div>
            </x-layouts.backend.card>
        </div>
        <div class="col-sm-12 col-lg-4 col-xl-4">
            <x-layouts.backend.card>
                <x-slot:title>Note</x-slot:title>
                <p>
                    Current Password: Provide your existing password to confirm your identity.<br><br>
                    New Password: Set a strong and unique new password to replace the old one.<br><br>
                    Password Confirmation: Confirm your new password to avoid any typing errors.<br><br>
                    Changing your password regularly is a best practice for maintaining the security of your admin
                    account. Use the Change Password feature to keep your software safe and sound.
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
