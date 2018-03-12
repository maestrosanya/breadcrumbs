<?php

namespace Maestro\Breadcrumbs\Facade;

use Illuminate\Support\Facades\Facade;

class Breadcrumbs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'breadcrumbs';
    }
}