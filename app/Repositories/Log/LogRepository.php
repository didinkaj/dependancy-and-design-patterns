<?php

namespace Blog\Repositories\Log;
use Blog\Logs;
use Auth;


class LogRepository
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
                'email' => Auth::id(),
            ];
        return $this->log->create($data);
    }


}