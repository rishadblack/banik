@push('css')
    <style>
        .container {
            margin-top: 100px;
            max-width: 22%;
        }

        .version {
            font-size: 11px;
        }
    </style>
@endpush

<div>

    <div class="container text-center">
        <h4>Banik BMS</h4>
        <br>
        <h5>Banik Business Management System</h5>
        <p class="text-muted version"> Version 1.0.0</p>
        <br><br>
        <div>
            <h6>Welcome Back!</h6>
            <p>Register to continue</p>
            <form wire:submit.prevent="register" action="" method="get">
                <div class="mb-3">
                    <x-input.text  wire:model="name" placeholder="e.g John Smith" require/>
                </div>
                <div class="mb-3">
                    <x-input.text  wire:model="email" placeholder="username@address.com" require/>
                    </div>
                <div class="mb-3">
                    <x-input.password  wire:model="password" placeholder="Password" require/>
                </div>
                <div class="mb-3">
                    <x-input.checkbox wire:model="customCheck1" label="I have read and agree to the Terms of Use and Privacy Policy." require/>
                </div>
                <div class="mb-3">
                    <x-button.default type="submit" class="btn btn-theme btn-lg fs-15px fw-500 d-block w-100">Sign Up</x-button.default>
                </div>
                <div class="text-muted text-center">
                    Already have an Admin ID? <a href="{{route('login')}}">Sign Up</a>
                </div>
            </form>
        </div>
    </div>






    {{-- <x-slot:title>Sign Up</x-slot:title>
            <x-layouts.backend.card>
            <form wire:submit.prevent="register" action="" method="get">
                <div class="mb-3">
                    <x-input.text  wire:model="name" label="Name" placeholder="e.g John Smith" require/>
                </div>
                <div class="mb-3">
                    <x-input.text  wire:model="email" label="Email" placeholder="username@address.com" require/>
                    </div>
                <div class="mb-3">
                    <x-input.password  wire:model="password" label="Password" require/>
                </div>

                <div class="mb-3">
                    <x-input.select wire:model="country" label="Country" :options="config('status.country')" require/>
                </div>
                <div class="mb-3">
                    <x-input.select wire:model="gender" label="Gender" :options="config('status.gender')" require/>

                    </div>
                <div class="mb-3">
                    <x-input.date wire:model="date" label="Date Of Birth" require/>
                </div>
                <div class="mb-3">
                    <x-input.checkbox wire:model="customCheck1" label="I have read and agree to the Terms of Use and Privacy Policy." require/>
                </div>
                <div class="mb-3">
                    <x-button.default type="submit" class="btn btn-theme btn-lg fs-15px fw-500 d-block w-100">Sign Up</x-button.default>
                </div>
                <div class="text-muted text-center">
                    Already have an Admin ID? <a href="{{route('login')}}">Sign In</a>
                </div>
            </form>
        </x-layouts.backend.card> --}}
</div>
