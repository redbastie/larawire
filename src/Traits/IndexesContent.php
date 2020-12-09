<?php

namespace Redbastie\Larawire\Traits;

trait IndexesContent
{
    public $perPage = 15;

    protected function getListeners()
    {
        return ['$refresh', 'loadMore'];
    }

    public function loadMore()
    {
        $this->perPage += 15;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
