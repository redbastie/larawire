<?php

namespace Redbastie\Larawire\Traits;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait HandlesData
{
    public $data = [];

    public function data($key)
    {
        return Arr::get($this->data, $key);
    }

    public function validateData($rules)
    {
        return Validator::make($this->data, $rules)->validate();
    }

    public function resetData()
    {
        $this->data = [];
    }

    public function addArrayData($key)
    {
        $this->data[$key][] = [];
    }

    public function removeArrayData($key, $index)
    {
        unset($this->data[$key][$index]);
    }
}
