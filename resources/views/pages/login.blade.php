@push('css')
    <style>
        .container {
            margin-top: 100px;
            max-width: 22%;
        }

        .version {
            font-size: 11px;
        }

        .btn-info {
            outline: none !important;
            border: none;
            background: #4375d9;
            width: 288px;
            height: 40px;
            border-radius: 17px !important;
            color: #fff;
            margin-bottom: 10px;
            font-size: 15px;
        }

        /* .rounder {
            border-radius: 17px !important;
        } */
        .btn:hover
{
  color: #fff;
  background-color:#518bfc;
  border-color: var(--bs-btn-hover-border-color);
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
            <span class="symbol-input100">
                <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
            <input class="input100" wire:model="email" type="text" placeholder="Email">
            <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input class="input100" wire:model="password" type="password" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
        </div>

        <div class="mb-3 d-flex justify-space-between">
            <x-input.checkbox wire:model="customCheck1" label="Remember me" require />
            <a href="#" class="ms-auto text-muted">Forgot password?</a>
        </div>

        <x-button.default class="btn btn-info" wire:target="login" type="submit">Sign In</x-button.default>
        <div class="text-center text-muted">
            Don't have an account yet? <a href="{{ route('register') }}">Sign up</a>.
        </div>
    </form>
</div>
