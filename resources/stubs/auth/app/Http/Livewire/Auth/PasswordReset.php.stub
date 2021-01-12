<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Redbastie\Larawire\Traits\HandlesData;

class PasswordReset extends Component
{
    use HandlesData;

    public $routeUri = '/password-reset/{token}/{email}';
    public $routeName = 'password.reset';
    public $routeMiddleware = 'guest';
    public $token, $email;

    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    public function render()
    {
        return view('livewire.auth.password-reset');
    }

    public function resetPassword()
    {
        $this->validateData([
            'password' => ['required', 'confirmed'],
        ]);

        $response = Password::reset([
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->data('password'),
            'password_confirmation' => $this->data('password_confirmation'),
        ], function (User $user) {
            $user->update(['password' => $this->data('password')]);
            Auth::login($user);
        });

        if ($response != Password::PASSWORD_RESET) {
            $this->addError('password', trans($response));

            return null;
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
