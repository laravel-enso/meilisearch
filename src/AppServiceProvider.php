<?php

namespace LaravelEnso\MeiliSearch;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\MeiliSearch\Console\Delete;
use LaravelEnso\MeiliSearch\Console\Flush;
use LaravelEnso\MeiliSearch\Console\Import;
use LaravelEnso\MeiliSearch\Console\Index;
use LaravelEnso\MeiliSearch\Http\Middleware\MeiliSearch;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->commands([
            Index::class,
            Delete::class,
            Flush::class,
            Import::class,
        ]);
    }

    public function register()
    {
        $this->app['router']
            ->aliasMiddleware('meili-search', MeiliSearch::class);
    }
}
