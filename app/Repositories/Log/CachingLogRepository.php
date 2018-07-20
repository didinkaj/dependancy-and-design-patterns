<?php

namespace Blog\Repositories\Log;

use Illuminate\Contracts\Cache\Repository as Cache;

use Blog\Repositories\LogRepositoryInterface;

/*
 * decorator implementation
 * */
class CachingLogRepository implements LogRepositoryInterface
{
    protected $repository;

    protected $cache;

    public function __construct(LogRepositoryInterface $repository, Cache $cache)
    {
        $this->repository = $repository;

        $this->cache = $cache;
    }

    public function getAllBlogs()
    {
        return $this->cache->tags('logs')->remember('all', 60, function () {

            return $this->repository->all();
        });
    }



    public function logNumber()
    {
        return $this->cache->tags('totalLogs')->remember('allLogs', 60, function () {
            return $this->repository->all()->count();
        });
    }
}