<?php

namespace App\Services\Prompt;

use App\Models\PromptGenerate;
use App\Services\ServiceContract;

interface PromptGenerateServiceContract extends ServiceContract
{
    public function store(array $attributes): PromptGenerate;
}
