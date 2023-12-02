@push('css')
    <style>
        .container {
            margin-top: 100px;
            max-width: 22%;
        }

        .version {
            font-size: 11px;
        }

        button {
            outline: none !important;
            border: none;
            background: #2bb146;
            width: 288px;
            height: 40px;
            border-radius: 17px;
            color: #fff;
            margin-bottom: 10px;
        }
    </style>
@endpush


<div>
    <div class="mb-2">
        <h6>Welcome Back!</h6>
        <p>Login to continue</p>
    </div>
    <form wire:submit.prevent="login" wire:target="login" method="get">
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
        {{-- <div class="mb-3">
        <x-input.text wire:model="email" placeholder="Enter Username" />
    </div> --}}
        {{-- <div class="mb-3">
            <x-input.password wire:model="password" placeholder="Enter Password" />
        </div> --}}
        <div class="mb-3 d-flex justify-space-between">
            <x-input.checkbox wire:model="customCheck1" label="Remember me" require />
            <a href="#" class="ms-auto text-muted">Forgot password?</a>
        </div>
        <button type="submit">Sign
            In</button>
        <div class="text-center text-muted">
            Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
        </div>

    </form>

{{-- <div class="copyright" class="text-muted text-center">
<p >System Developed by <span>Sylloo Innovation Limited © 2023. All Rights Reserved</span></p>
<p>Licensed to <span>M/S Banik Store, Savar, Dhaka</span></p>
</div> --}}


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
