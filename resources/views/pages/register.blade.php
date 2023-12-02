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
    <form wire:submit.prevent="register" action="" method="get">
        <div class="wrap-input100 validate-input" data-validate = "Valid name is required: John Seg">
            <input class="input100" wire:model="name" type="text" placeholder="Name">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-user" aria-hidden="true"></i>
            </span>
        </div>
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
        <button type="submit">Sign Up</button>
        <div class="text-center text-muted">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>.
        </div>

    </form>




</div>
