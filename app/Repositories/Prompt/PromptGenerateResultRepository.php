<?php

namespace App\Repositories\Prompt;

use App\Models\PromptGenerate;
use App\Models\PromptGenerateResult;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class PromptGenerateResultRepository extends BaseRepository
{
    public function createForPromptGenerate(
        PromptGenerate $promptGenerate,
        string         $url,
        Carbon         $created
    ): PromptGenerateResult {
        return $promptGenerate->results()->create([
            'url' => $url,
            'created_at' => $created,
        ]);
    }
}
