<?php

namespace Arca\Domains\Ocurrence\Database\Repositories;

use Arca\Domains\Ocurrence\Database\Models\Incident;
use Arca\Support\Database\Repository\Repository;
use Exception;
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
     */
    public function updateOne(array $data, string $id): Model
    {
        $incident = $this->newQuery()
            ->where('incident_id', $id)
            ->first();
        if ($incident === null) {
            throw new \RuntimeException('Incident not found');
        }

        return $this->update($incident, $data);
    }

    /**
     * @param array<object> $filter
     * @return mixed
     * @throws BindingResolutionException
     */
    public function getIncidents($filter = [])
    {
        $query = $this->newQuery();

        if (isset($filter['id']) && $filter['id'] !== '') {
            $query->where('id', $filter['id']);
        }

        if (isset($filter['incident_id']) && $filter['incident_id'] !== '') {
            $query->where('incident_id', $filter['incident_id']);
        }

        if (isset($filter['company_id']) && $filter['company_id'] !== '') {
            $query->where('company_id', $filter['company_id']);
        }

        return $query->get();
    }
}
