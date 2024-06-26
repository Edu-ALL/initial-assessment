<?php

namespace App\Providers;

use App\Interfaces\AnswerRepositoryInterface;
use App\Interfaces\QuestionRepositoryInterface;
use App\Repositories\AnswerRepository;
use App\Repositories\QuestionRepository;
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
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
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
