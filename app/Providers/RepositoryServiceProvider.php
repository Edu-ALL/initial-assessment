<?php

namespace App\Providers;

use App\Interfaces\AnswerRepositoryInterface;
use App\Repositories\AnswerRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(AnswerRepositoryInterface::class, AnswerRepository::class);
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
