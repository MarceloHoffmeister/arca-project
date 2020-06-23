<?php


namespace Arca\Domains\Ocurrence\Services;


use Arca\Domains\Ocurrence\Database\Repositories\IncidentsRepository;
use Illuminate\Database\Eloquent\Model;

class IncidentsService
{
    private $repo;

    public function __construct(IncidentsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create($data): Model
    {
        return $this->repo->create($data);
    }
}
