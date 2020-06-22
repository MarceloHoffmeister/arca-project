<?php

namespace Arca\Domains\Ocurrence\Providers;

use Arca\Domains\Ocurrence\Http\Routes\Routes;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Arca\Domains\Ocurrence\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function register()
    {
        (new Routes([
            'namespace' => $this->namespace,
            'prefix' => 'ocurrence',
            'group' => 'api',
//            'middleware' => 'auth:api'
        ]))->register();
    }
}
