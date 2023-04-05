<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements RepositoryContract
{
    /**
     * @param string $model
     * @example App\Models\User\User::class
     */
    public function __construct(protected string $model) {}

    public function all(): Collection
    {
        return $this->model::all();
    }

    public function show($id, array $select = ['*'], array $with = null): ?Model
    {
        return $this->model::select($select)->with($with)->find();
    }

    public function showOrFail($id, array $select = ['*'], array $with = null): Model
    {
        return $this->model::select($select)->with($with)->findOrFail();
    }

    public function create(array $data): Model
    {
        return $this->model::create($data);
    }

    public function createOrFirst(array $data): Model
    {
        return $this->model::firstOrCreate($data);
    }

    public function update($id, array $data): Model
    {
        return $this->model::update($id, $data);
    }

    public function delete($id): bool
    {
        return $this->model::delete($id);
    }

    public function query()
    {
        return $this->model::query();
    }
}
