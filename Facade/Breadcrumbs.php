<?php

namespace Maestro\MaestroAdmin\App\Components\Breadcrumbs\Facade;

use Maestro\MaestroAdmin\App\Components\Breadcrumbs\BreadcrumbsManager;
use Illuminate\Support\Facades\Facade;

class Breadcrumbs extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'breadcrumbs';
    }
}