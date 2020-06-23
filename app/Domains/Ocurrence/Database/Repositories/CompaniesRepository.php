<?php

namespace Arca\Domains\Ocurrence\Database\Repositories;

use Arca\Domains\Ocurrence\Models\Company;
use Arca\Support\Database\Repository\Repository;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

class CompaniesRepository extends Repository
{
    protected $modelClass = Company::class;

    /**
     * Atualizar o registro especificado no banco de dados.
     * @param array<object> $data
     * @param string $id
     * @return Model
     * @throws Exception
     */
    public function updateOne(array $data, string $id): Model
    {
        $company = $this->newQuery()
            ->where('company_id', $id)
            ->first();
        if ($company === null) {
            throw new \RuntimeException('Company not found');
        }

        return $this->update($company, $data);
    }

    /**
     * @param array<object> $filter
     * @return mixed
     * @throws BindingResolutionException
     */
    public function getCompanies($filter = [])
    {
        $query = $this->newQuery();

        if (isset($filter['id']) && $filter['id'] !== '') {
            $query->where('id', $filter['id']);
        }

        if (isset($filter['company_id']) && $filter['company_id'] !== '') {
            $query->where('company_id', $filter['company_id']);
        }

        if (isset($filter['email']) && $filter['email'] !== '') {
            $query->where('email', $filter['email']);
        }

        if (isset($filter['city']) && $filter['city'] !== '') {
            $query->where('city', $filter['city']);
        }

        return $query->get();
    }
}
