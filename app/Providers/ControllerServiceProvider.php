<?php

namespace App\Providers;

use App\Http\Controllers\Prompt\PromptGenerateController;
use App\Models\PromptGenerate;
use App\Models\PromptGenerateResult;
use App\Repositories\Prompt\PromptGenerateRepository;
use App\Repositories\Prompt\PromptGenerateResultRepository;
use App\Services\OpenAI\Images\ApiService;
use App\Services\Prompt\PromptGenerateService;
use App\Services\Prompt\PromptGenerateServiceContract;
use Illuminate\Support\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            PromptGenerateRepository::class,
            fn() => new PromptGenerateRepository(PromptGenerate::class)
        );
        $this->app->singleton(
            PromptGenerateResultRepository::class,
            fn() => new PromptGenerateResultRepository(PromptGenerateResult::class)
        );
        $this->app->singleton(
            ApiService::class,
            fn($app) => new ApiService()
        );
        $this->app->singleton(
            PromptGenerateService::class,
            fn($app) => new PromptGenerateService(
                $app->make(PromptGenerateRepository::class),
                $app->make(PromptGenerateResultRepository::class),
                $app->make(ApiService::class)
            )
        );
        $this->app->when(PromptGenerateController::class)
                  ->needs(PromptGenerateServiceContract::class)
                  ->give(PromptGenerateService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
