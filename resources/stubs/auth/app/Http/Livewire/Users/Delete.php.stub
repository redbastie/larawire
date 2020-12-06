<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Delete extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.users.delete');
    }

    public function delete()
    {
        $this->user->delete();

        $this->emitUp('$refresh');
    }
}
