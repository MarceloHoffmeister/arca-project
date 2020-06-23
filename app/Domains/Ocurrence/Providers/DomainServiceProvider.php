<?php

namespace Arca\Domains\Ocurrence\Providers;

use Arca\Domains\Ocurrence\Database\Factories\CompaniesFactory;
use Arca\Domains\Ocurrence\Database\Factories\IncidentsFactory;
use Arca\Support\Providers\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->registerRoutes();
        $this->registerFactories();
    }

    protected function registerRoutes(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }

    private function registerFactories(): void
    {
        (new IncidentsFactory())->define();
        (new CompaniesFactory())->define();
    }
}
