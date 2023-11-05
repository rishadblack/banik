@push('css')
    <style>
        .form-check {
            font-size: 12px;
        }
        .container-login100-form-btn {
            padding-top: 0px;
        }
        .wrap-login100 {
  padding: 150px 130px 33px 70px;
}
* {
  margin: 0px;
  padding: 0px;
  box-sizing: border-box;
}
    </style>
@endpush
<div>
    <x-slot:title>Sign Up</x-slot:title>
    <div class="wrap-input100 validate-input">
        <input class="input100" wire:model="name" type="text" placeholder="Name">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input">
        <input class="input100" wire:model="email" type="text" placeholder="Email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input">
        <input class="input100" wire:model="password" type="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    <div>
        <x-input.checkbox wire:model="customCheck1" style="font-size:11px"
            label="I have read and agree to the Terms of Use and Privacy Policy." require />
    </div>

    <div class="container-login100-form-btn">
        <button wire:click="register" class="login100-form-btn">
            Register
        </button>
    </div>


    <div class="text-center p-t-136">
        <a class="txt2" href="{{ route('login') }}">
            Sign in to your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
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
