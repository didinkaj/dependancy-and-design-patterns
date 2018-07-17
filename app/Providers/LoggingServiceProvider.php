<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

use Blog\Logger\SystemLog;

use Blog\Logger\UserLog;

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
        //
        $this->app->bind('Blog\Logger\Contracts\SystemLogInterface',function ($app){
            return new UserLog();
        });
    }
}
