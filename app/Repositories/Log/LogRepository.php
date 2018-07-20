<?php

namespace Blog\Repositories\Log;

use Blog\Repositories\LogRepositoryInterface;

use Blog\Logs;

use Auth;


class LogRepository implements LogRepositoryInterface
{
    public $log;


    function __construct(Logs $log)
    {
        $this->log = $log;
    }


    public function getAllBlogs()
    {
        return $this->log->latest()->paginate(3);

    }


    public function saveLog($message = null)
    {
        $data =
            [
                'message' => $message,
                'email' => Auth::user()->email,
            ];
        return $this->log->create($data);
    }

    public function logNumber()
    {
        return $this->log->all()->count();
    }


}