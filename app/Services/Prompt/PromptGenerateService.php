<?php

namespace App\Services\Prompt;

use App\Models\PromptGenerate;
use App\Repositories\RepositoryContract;

class PromptGenerateService implements PromptGenerateServiceContract
{
    public function __construct(private readonly RepositoryContract $repository) {}


    public function store(array $attributes): PromptGenerate
    {
        return $this->repository->create($attributes);
    }
}
