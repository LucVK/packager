<?php

namespace Rvwaarloos\Rvwaarloos\Facades;

use Illuminate\Support\Facades\Facade;

class Rvwaarloos extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'rvwaarloos';
    }
}
