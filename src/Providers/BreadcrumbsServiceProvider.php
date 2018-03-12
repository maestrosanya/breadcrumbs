<?php

namespace Maestro\Breadcrumbs\Providers;


use Illuminate\Support\ServiceProvider;
use Maestro\Breadcrumbs\BreadcrumbsManager;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    public function register()
    {

        App::bind('breadcrumbs', function($app) {

            return new BreadcrumbsManager();
        });

    }
}