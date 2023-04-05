<?php

namespace App\Services\Prompt;

use App\Models\Prompt;
use App\Models\PromptGenerate;
use App\Models\User;
use App\Repositories\Prompt\PromptGenerateResultRepository;
use App\Repositories\RepositoryContract;
use App\Services\OpenAI\Images\ApiService;
use App\Services\OpenAI\Images\ImageSize;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PromptGenerateService implements PromptGenerateServiceContract
{
    public function __construct(
        private readonly RepositoryContract             $repository,
        private readonly PromptGenerateResultRepository $resultRepository,
        private readonly ApiService                     $apiService,
    ) {}


    public function store(Prompt $prompt, User $user, array $options): PromptGenerate
    {
        $promptGenerate = $this->repository->create([
            'prompt_id' => $prompt->getKey(),
            'user_id' => $user->getKey(),
        ]);
        foreach ($options as $key => $value) {
            $promptGenerate->options()->create([
                'value' => $value,
                'prompt_option_id' => substr($key, 1),
            ]);
        }
        return $promptGenerate;
    }

    public function callApi(PromptGenerate $promptGenerate, int $n = 1, ImageSize $size = ImageSize::s512): void
    {
        $template = $promptGenerate->prompt->template;
        $promptGenerate->options->each(function ($option) use (&$template) {
            $template = Str::of($template)->replace("[{$option->option->name}]", $option->value);
        });

        $result = $this->apiService->call($template, $n, $size);

        foreach ($result['data'] as $data) {
            $date = Carbon::createFromTimestamp($result['created']);
            $this->resultRepository->createForPromptGenerate($promptGenerate, $data['url'], $date);
        }
    }
}
