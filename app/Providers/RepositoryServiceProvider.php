<?php

namespace App\Providers;

use App\Contracts\AuthorRepositoryInterface;
use App\Contracts\BookRepositoryInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookRepositoryInterface::class,BookRepository::class);
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);;
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
