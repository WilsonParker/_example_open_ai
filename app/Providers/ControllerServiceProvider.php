<?php

namespace App\Providers;

use App\Http\Controllers\Prompt\PromptGenerateController;
use App\Models\PromptGenerate;
use App\Repositories\Prompt\PromptGenerateRepository;
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
            PromptGenerateService::class,
            fn($app) => new PromptGenerateService($app->make(PromptGenerateRepository::class))
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
