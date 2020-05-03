<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\BookService;
use App\Repositories\Book\BookRepository;
use App\Repositories\Book\BookRepositoryInterface;

class BookServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            BookRepositoryInterface::class,
            BookRepository::class
        );

        $this->app->bind(
            'BookService',
            BookService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
