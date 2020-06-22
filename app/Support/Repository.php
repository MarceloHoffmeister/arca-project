<?php

namespace Arca\Support\Repository;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    /**
     * Model class for repo.
     *
     * @var string
     */
    protected $modelClass;

    /**
     * @return Builder|\Illuminate\Database\Query\Builder
     * @throws BindingResolutionException
     */
    public function newQuery()
    {
        return app()->make($this->modelClass)->newQuery();
    }

    /**
     * @param null $query
     * @param int $take
     * @param bool $paginate
     * @return LengthAwarePaginator|Builder[]|Collection|\Illuminate\Support\Collection
     * @throws BindingResolutionException
     */
    public function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (!$query) {
            $query = $this->newQuery();
        }

        if ($paginate) {
            return $query->paginate($take);
        }

        if ($take) {
            return $query->take($take)->get();
        }

        return $query->get();
    }

    public function getAll($take = 15, $paginate = false)
    {
        try {
            return $this->doQuery(null, $take, $paginate);
        } catch (BindingResolutionException $e) {
        }
    }

    /**
     * Retrieves a record by its id
     * If $fail is true, a ModelNotFoundException is throwed.
     * @param int $id
     * @param bool $fail
     * @return Model
     * @throws BindingResolutionException
     */
    public function findByID($id, $fail = true)
    {
        if ($fail) {
            return $this->newQuery()->findOrFail($id);
        }

        return $this->newQuery()->find($id);
    }

    /**
     * Retrieves a record by its Company Id
     * If $fail is true, a ModelNotFoundException is throwed.
     * @param int $id
     * @return Model
     * @throws BindingResolutionException
     */
    public function findByCompanyID($id)
    {
        return $this->newQuery()->where('id_empresa', $id)->first();
    }

    /**
     * Find element by primary key with company_id defined for default
     * @param $id
     * @return mixed
     * @throws BindingResolutionException
     */
    public function findOne($id)
    {
        $pk_name = app()->make($this->modelClass)->getKeyName();

        return $this->newQuery()
            ->where($pk_name, $id)
            ->get()
            ->first();
    }

    /**
     * Creates a Model object with the $data information.
     * @param array $data
     * @return Model
     * @throws BindingResolutionException
     */
    public function factory(array $data = []): Model
    {
        $model = $this->newQuery()->getModel()->newInstance();

        $this->fillModel($model, $data);

        return $model;
    }

    /**
     * Fill a (desirable empty) model with provided data.
     * @param array $data
     * @return Model
     */
    public function fillModel(Model $model, array $data = []): ?Model
    {
        $model->fill($data);
    }

    /**
     * Save a Model object;
     * @param Model $model
     * @return Model
     */
    public function save(Model $model): Model
    {
        $model->save();

        return $model;
    }

    /**
     * @param array $data
     * @return Model
     * @throws BindingResolutionException
     */
    public function create(array $data)
    {
        $data["id_empresa"] = 1;
        $data["id_matriz"] = 1;
        $data["id_pessoa_registro"] = session()->get("id_pessoa");
        $data["nome_pessoa_registro"] = session()->get("nome_pessoa");

        $model = $this->factory($data);

        return $this->save($model);
    }

    /**
     * Fill a (desirable empty) model with provided data.
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data = []): Model
    {

        $data["id_pessoa_registro"] = session()->get("id_pessoa");
        $data["nome_pessoa_registro"] = session()->get("nome_pessoa");
        $this->fillModel($model, $data);
        return $this->save($model);
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function delete(Model $model): Model
    {
        $model = $this->delete();

        return $model;
    }

}
