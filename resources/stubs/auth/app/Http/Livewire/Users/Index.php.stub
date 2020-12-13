<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Redbastie\Larawire\Traits\DisplaysData;

class Index extends Component
{
    use DisplaysData;

    public $routeUri = '/users';
    public $routeName = 'users';
    public $routeMiddleware = 'auth';

    public function render()
    {
        return view('livewire.users.index', [
            'users' => $this->query()->paginate($this->perPage),
        ]);
    }

    public function query()
    {
        $query = User::query();

        if ($this->search) {
            $query->where(function (Builder $query) {
                $query->where('name', 'like', '%' . $this->search . '%');
                $query->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        return $query->orderBy('name');
    }
}
