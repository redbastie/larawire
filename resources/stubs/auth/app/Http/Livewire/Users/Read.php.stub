<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Read extends Component
{
    public $user;
    protected $listeners = ['showReadUserModal'];

    public function render()
    {
        return view('livewire.users.read');
    }

    public function showReadUserModal(User $user)
    {
        $this->user = $user;

        $this->emit('showModal', 'read-user-modal');
    }
}
