<?php

namespace Blog\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton('Blog\Repositories\Log\LogRepositoryInterface', function () {
            $baseRepo = new \Blog\Repositories\Log\LogRepository(new \Blog\Logs());
            $cachingRepo = new \Blog\Repositories\Log\CachingLogRepository($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
