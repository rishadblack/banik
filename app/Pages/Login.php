<?php

namespace App\Pages;

use App\Models\User;

use Illuminate\Support\Str;
use App\Http\Common\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.auth')]
class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    public function login()
    {
        $this->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $this->ensureIsNotRateLimited();

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
            'is_banned' => null,
        ], $this->password)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            RateLimiter::hit($this->throttleKey());

            if (User::where('email', $this->email)->whereNotNull('is_banned')->exists()) {
                $this->addError('email', 'Your account is banned. Please contact admin.');

                return true;
            }

            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey()
    {
        return Str::lower($this->email) . '|' . request()->ip();
    }



    public function render()
    {
        return view('pages.login');
    }
}
