<?php

namespace App\Services\Prompt;

use App\Models\Prompt;
use App\Models\PromptGenerate;
use App\Models\User;
use App\Repositories\RepositoryContract;
use App\Services\OpenAI\Images\ApiService;
use App\Services\OpenAI\Images\ImageSize;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PromptGenerateService implements PromptGenerateServiceContract
{
    public function __construct(
        private readonly RepositoryContract $repository,
        private readonly ApiService         $service
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

    public function callApi(PromptGenerate $promptGenerate, int $n = 1, ImageSize $size = ImageSize::s512): array
    {
        $template = $promptGenerate->prompt->template;
        $promptGenerate->options->each(function ($option) use (&$template) {
            $template = Str::of($template)->replace("[{$option->option->name}]", $option->value);
        });

        // $result = $this->service->call($template, $n, $size);

        $date = 1680683316;
        $url = "https://oaidalleapiprodscus.blob.core.windows.net/private/org-aoEz5iNLIebmbf63rluY80og/user-qu4iAXir7V7epx4GnSdnMeVz/img-Ri2LOWnQBfsgrLc1rp8a5gDF.png?st=2023-04-05T07%3A28%3A36Z&se=2023-04-05T09%3A28%3A36Z&sp=r&sv=2021-08-06&sr=b&rscd=inline&rsct=image/png&skoid=6aaadede-4fb3-4698-a8f6-684d7786b067&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2023-04-05T07%3A12%3A58Z&ske=2023-04-06T07%3A12%3A58Z&sks=b&skv=2021-08-06&sig=H4vvZU8HZq8PnSfUyDk5NmjPBVy%2BZhlEMChuU7RKRAg%3D";
        $date = Carbon::createFromTimestamp($date);

        return [
            'created' => $date->format('Y-m-d'),
            'url' => $url,
        ];
    }
}
