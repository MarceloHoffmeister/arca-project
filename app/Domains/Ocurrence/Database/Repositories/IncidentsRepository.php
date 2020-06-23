<?php

namespace Arca\Domains\Ocurrence\Database\Repositories;

use Arca\Domains\Ocurrence\Database\Models\Incident;
use Arca\Support\Database\Repository\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Model;

class IncidentsRepository extends Repository
{
    protected $modelClass = Incident::class;

    /**
     * Atualizar o registro especificado no banco de dados.
     * @param array<object> $data
     * @param string $id
     * @return Model
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function updateOne(array $data, string $id): Model
    {
//        $plan = $this->newQuery()
//            ->where('id', $id)
//            ->first();
//        if ($plan === null) {
//            throw PlansException::databaseError('Plano não encontrado para atualização');
//        }
//
//        return $this->update($plan, $data);
    }

    /**
     * @param array<object> $filter
     * @return mixed
     * @throws BindingResolutionException
     */
    public function getPlans($filter = [])
    {
//        $query = $this->newQuery();
//
//        if (isset($filter['id']) && $filter['id'] !== '') {
//            $query->where('id', $filter['id']);
//        }
//
//        if (isset($filter['plan_id']) && $filter['plan_id'] !== '') {
//            $query->where('plan_id', $filter['plan_id']);
//        }
//
//        if (isset($filter['amount']) && $filter['amount'] !== '') {
//            $query->where('amount', $filter['amount']);
//        }
//
//        return $query->get();
    }
}
