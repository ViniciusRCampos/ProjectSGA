<?php

namespace App\Traits;

trait HasActive
{
    public function toggleStatus(): bool
    {
        $this->active = !$this->active;
        return $this->save();
    }
}