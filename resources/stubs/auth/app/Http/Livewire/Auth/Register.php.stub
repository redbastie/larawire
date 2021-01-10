<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Redbastie\Larawire\Rules\ReCaptchaRule;
use Redbastie\Larawire\Traits\HandlesData;

class Register extends Component
{
    use HandlesData;

    public $routeUri = '/register';
    public $routeName = 'register';
    public $routeMiddleware = 'guest';

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $validator = Validator::make($this->data, [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'recaptcha' => ['required', new ReCaptchaRule],
        ]);

        if ($validator->fails()) {
            $this->setErrorBag($validator->errors());
            $this->emit('resetReCaptcha');

            return null;
        }

        $user = User::create($validator->getData());

        Auth::login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
