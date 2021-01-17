<?php

namespace Redbastie\Larawire\Traits;

trait DisplaysData
{
    public $perPage = 20;
    public $search;
    public $loadMore = true;

    protected function getListeners()
    {
        return ['$refresh', 'loadMore'];
    }

    public function loadMore()
    {
        $this->perPage += 20;

        if ($this->perPage >= $this->query()->count()) {
            $this->loadMore = false;
        }

        $this->emit('loadedMore');
    }

    public function updatedSearch()
    {
        $this->perPage = 20;
    }
}
