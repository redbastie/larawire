<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Redbastie\Larawire\Traits\HandlesData;

class PasswordForgot extends Component
{
    use HandlesData;

    public $routeUri = '/password-forgot';
    public $routeName = 'password.forgot';
    public $routeMiddleware = 'guest';
    public $sent;

    public function render()
    {
        return view('livewire.auth.password-forgot');
    }

    public function sendResetLink()
    {
        $validatedData = $this->validateData([
            'email' => ['required', 'email'],
        ]);

        $response = Password::sendResetLink($validatedData);

        if ($response != Password::RESET_LINK_SENT) {
            $this->addError('email', trans($response));

            return;
        }

        $this->sent = trans($response);
    }
}
