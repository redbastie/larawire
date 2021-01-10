<?php

namespace App\Http\Livewire\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;
use Redbastie\Larawire\Traits\HandlesData;

class Login extends Component
{
    use HandlesData;

    public $routeUri = '/login';
    public $routeName = 'login';
    public $routeMiddleware = 'guest';
    public $username = 'email';

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login()
    {
        $validatedData = $this->validateData([
            $this->username => ['required'],
            'password' => ['required'],
        ]);

        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $this->addError($this->username, trans('auth.throttle', [
                'seconds' => RateLimiter::availableIn($this->throttleKey()),
            ]));

            return null;
        }
        else if (!Auth::attempt($validatedData, $this->data('remember'))) {
            RateLimiter::hit($this->throttleKey());

            $this->addError($this->username, trans('auth.failed'));

            return null;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function throttleKey()
    {
        return $this->data($this->username) . '|' . request()->ip();
    }
}
