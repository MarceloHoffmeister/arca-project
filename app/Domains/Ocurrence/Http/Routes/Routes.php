<?php

namespace Arca\Domains\Ocurrence\Http\Routes;

use Arca\Support\Http\Routing\RouteFile;

class Routes extends RouteFile
{

    protected function routes()
    {
        $this->router->get("/incidents", "IncidentsController@index");
        $this->router->get("/companies", "CompaniesController@index");
        $this->router->post("/incidents", "IncidentsController@create");
        $this->router->post("/companies", "CompaniesController@create");
        $this->router->put("/incidents", "IncidentsController@update");
        $this->router->put("/companies", "CompaniesController@update");
        $this->router->delete("/incidents", "IncidentsController@delete");
        $this->router->delete("/companies", "CompaniesController@delete");
    }
}
