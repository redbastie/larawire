<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Redbastie\Larawire\Traits\HandlesData;

class Save extends Component
{
    use HandlesData;

    public $user;
    protected $listeners = ['showSaveUserModal'];

    public function render()
    {
        return view('livewire.users.save');
    }

    public function showSaveUserModal(User $user = null)
    {
        $this->user = $user ?? new User;
        $this->data = $user->toArray();

        $this->emit('showModal', 'save-user-modal');
    }

    public function save()
    {
        $validatedData = $this->validateData($this->user->rules());

        if ($this->user && $this->user->exists) {
            $this->user->update($validatedData);
        }
        else {
            $this->user->create($validatedData);
        }

        $this->emitUp('$refresh');
        $this->emit('hideModal', 'save-user-modal');
    }
}
