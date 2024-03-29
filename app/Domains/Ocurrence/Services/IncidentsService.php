<?php


namespace Arca\Domains\Ocurrence\Services;


use Arca\Domains\Ocurrence\Database\Models\Incident;
use Arca\Domains\Ocurrence\Database\Repositories\IncidentsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class IncidentsService
{
    private $repo;

    public function __construct(IncidentsRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index($data)
    {
        return $this->repo->getIncidents($data);
    }

    public function create($data): Model
    {
        $response = $this->repo->create($data);

        return $this->repo->findById($response->id);
    }

    public function update($data): Model
    {
        $incident_id = $data['incident_id'];
        return $this->repo->updateOne($data, $incident_id);
    }

    public function delete($data): bool
    {
        $id = $data[0]->incident_id;
        $model = Incident::where('incident_id', '=', $id)->firstOrFail();
        return $this->repo->delete($model);
    }
}
