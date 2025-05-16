<?php

namespace FzlxTech\LaravelWso2\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FzlxTech\LaravelWso2\LaravelWso2
 */
class LaravelWso2 extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \FzlxTech\LaravelWso2\LaravelWso2::class;
    }
}
