<?php

namespace Concept7\ComposerHealth\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Concept7\ComposerHealth\ComposerHealth
 */
class ComposerHealth extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Concept7\ComposerHealth\ComposerHealth::class;
    }
}
