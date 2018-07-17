<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

use Blog\Logger\SystemLog;

use Blog\Logs;

use Blog\Repositories\Log\LogRepository;

use Blog\Logger\Contracts\SystemLogInterface;

class MyFacadeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //

        $this->app->bind(SystemLogInterface::class, function ($app) {
            return new SystemLog($app->make(LogRepository::class));
        });
        $this->app->bind(LogRepository::class, function ($app) {
            return new LogRepository($app->make(Logs::class));
        });
        $this->app->bind(Logs::class, Logs::class);
    }
}
