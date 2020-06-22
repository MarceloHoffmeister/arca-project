<?php

namespace Arca\Domains\Ocurrence\Providers;

use Arca\Support\Providers\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerRoutes();
        $this->registerEloquentFactoriesFrom(__DIR__ . '/../Factories');
    }

    protected function registerRoutes(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
