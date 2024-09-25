<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\paginator;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Paginator::useBootstrap();
        
        \URL::forceScheme('https');
        $this->app['request']->server->set('HTTPS','on');
    }
}
