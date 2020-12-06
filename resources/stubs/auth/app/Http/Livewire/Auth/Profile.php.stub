<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Redbastie\Larawire\Traits\HandlesData;

class Profile extends Component
{
    use HandlesData;

    public function mount()
    {
        $this->data = Auth::user()->toArray();
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }

    public function save()
    {
        $validatedData = $this->validateData([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore(Auth::user()->id)],
            'password' => ['nullable', 'confirmed'],
        ]);

        Auth::user()->update($validatedData);

        $this->emit('hideModal', 'profile-modal');
    }
}
