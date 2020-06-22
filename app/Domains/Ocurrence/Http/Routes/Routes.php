<?php

namespace Arca\Domains\Ocurrence\Http\Routes;

use Arca\Support\Http\Routing\RouteFile;

class Routes extends RouteFile
{

    protected function routes()
    {
        $this->router->get("/", "IncidentController@index")->middleware('auth:api');
    }
}
