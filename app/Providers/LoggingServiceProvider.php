<?php

namespace Blog\Providers;

use Blog\Logs;
use Illuminate\Support\ServiceProvider;

use Blog\Logger\SystemLog;

use Blog\Logger\UserLog;

use Blog\Logger\Contracts\SystemLogInterface;

use Blog\Repositories\Log\LogRepository;

class LoggingServiceProvider extends ServiceProvider
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
        //binding the interface class
        $this->app->bind(SystemLogInterface::class, function ($app) {
            return new UserLog($app->make(LogRepository::class));
        });


        $this->app->bind(LogRepository::class, function ($app) {
            return new LogRepository($app->make(Logs::class));
        });
        $this->app->bind(Logs::class, Logs::class);
    }
}
