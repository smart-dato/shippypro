<?php

namespace SmartDato\ShippyPro\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \SmartDato\ShippyPro\ShippyPro
 */
class ShippyPro extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \SmartDato\ShippyPro\ShippyPro::class;
    }
}
