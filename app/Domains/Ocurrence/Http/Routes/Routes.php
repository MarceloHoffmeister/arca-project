<?php

namespace Arca\Domains\Ocurrence\Http\Routes;

use Arca\Support\Http\Routing\RouteFile;

class Routes extends RouteFile
{

    protected function routes()
    {
        $this->router->get("/incidents", "IncidentsController@index");
        $this->router->post("/incidents", "IncidentsController@create");
        $this->router->post("/companies", "CompaniesController@create");
    }
}
