<?php


namespace Arca\Domains\Ocurrence\Services;

use Arca\Domains\Ocurrence\Database\Repositories\CompaniesRepository;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

class CompaniesService
{
    private $repo;

    public function __construct(CompaniesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create($data): Model
    {
        return $this->repo->create($data);
    }
}
