<?php

namespace Arca\Units\SPA\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function register()
    {
        app('router')->get('/', function () {
            return view('index');
        });
    }
}
