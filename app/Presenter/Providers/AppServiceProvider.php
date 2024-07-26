<?php

namespace App\Presenter\Providers;

use App\Domain\User\UserRepositoryInterface;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(\L5Swagger\L5SwaggerServiceProvider::class);
        $this->registerRepositories();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Factory::guessModelNamesUsing(function($string){
            return 'App\\Infrastructure\\Database\\Models\\';
        });
    }

    private function registerRepositories(): void
    {
        $this->app->bind(
            \App\Domain\User\UserRepositoryInterface::class,
            \App\Infrastructure\Repositories\UserRepository::class
        );


    }
}
