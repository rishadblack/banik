@push('css')
<style>
    .container{
        margin-top: 100px;
        max-width: 22%;
    }
    .version{
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
            <p>Login to continue</p>
            <form wire:submit.prevent="login" method="get">
                <div class="mb-3">
                    <x-input.text wire:model="email" placeholder="Enter Username" />
                </div>
                <div class="mb-3">
                    <x-input.password wire:model="password" placeholder="Enter Password"/>
                </div>
                <div class="mb-3 d-flex justify-space-between">
                    <x-input.checkbox wire:model="customCheck1" label="Remember me" require />
                    <a href="#" class="ms-auto text-muted">Forgot password?</a>
                </div>
                <x-button.default type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Sign
                    In</x-button.default>
                <div class="text-center text-muted">
                    Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
                </div>
        </div>
    </div>




    {{-- <x-slot:title>Sign In</x-slot:title>
                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" wire:model="email" type="text" placeholder="Email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                    <input class="input100" wire:model="password" type="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button wire:click="login" wire:target="login" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="{{route('register')}}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div> --}}

    {{--
                    <x-slot:title>Sign In</x-slot:title>
                    <form wire:submit.prevent="login" method="get">
					<div class="mb-3">
						<x-input.text  wire:model="email" label="Email" placeholder="username@address.com"/>
					</div>
					<div class="mb-3">
						<x-input.password  wire:model="password" label="Password"/>
					</div>
					<div class="mb-3 d-flex justify-space-between" >
                        <x-input.checkbox wire:model="customCheck1" label="Remember me" require/>
						<a href="#" class="ms-auto text-muted">Forgot password?</a>
					</div>
					<x-button.default type="submit" class="btn btn-theme btn-lg d-block w-100 fw-500 mb-3">Sign In</x-button.default>
					<div class="text-center text-muted">
						Don't have an account yet? <a href="{{route('register')}}">Sign up</a>.
					</div>
				</form> --}}


</div>
