<?php

namespace Rvwaarloos\Rvwaarloos\Models\Traits;

trait UsernameTrait
{
    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
