<?php

namespace App\Services\Prompt;

use App\Models\Prompt;
use App\Models\PromptGenerate;
use App\Models\User;
use App\Services\ServiceContract;

interface PromptGenerateServiceContract extends ServiceContract
{
    public function store(Prompt $prompt, User $user, array $options): PromptGenerate;

    public function callApi(PromptGenerate $promptGenerate): array;
}
