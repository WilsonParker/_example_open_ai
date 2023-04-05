<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryContract
{
    public function all(): Collection;

    public function show($id, array $select = ['*'], array $with = null): ?Model;

    public function showOrFail($id, array $select = ['*'], array $with = null): Model;

    public function create(array $data): Model;

    public function createOrFirst(array $data): Model;

    public function update($id, array $data): Model;

    public function delete($id): bool;
}
