<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Eloquent\EloquentPostRepository;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Eloquent\EloquentCategoryRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, EloquentCategoryRepository::class);
        $this->app->bind(PostRepositoryInterface::class, EloquentPostRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
