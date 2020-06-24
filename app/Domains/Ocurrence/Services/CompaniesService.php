<?php


namespace Arca\Domains\Ocurrence\Services;

use Arca\Domains\Ocurrence\Database\Repositories\CompaniesRepository;
use Arca\Domains\Ocurrence\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompaniesService
{
    private $repo;

    public function __construct(CompaniesRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index($data)
    {
        return $this->repo->getCompanies($data);
    }

    public function create($data): Model
    {
        $response =  $this->repo->create($data);

        return $this->repo->findById($response->id);
    }

    public function update($data): Model
    {
        $company_id = $data['company_id'];
        return $this->repo->updateOne($data, $company_id);
    }

    public function delete($data): bool
    {
        $id = $data[0]->company_id;
        $model = Company::where('company_id', '=', $id)->firstOrFail();
        return $this->repo->delete($model);
    }
}
