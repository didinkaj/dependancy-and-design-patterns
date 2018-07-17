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
        return $this->log->latest()->with('user')->paginate(3);

    }


    public function saveLog($message,$email)
    {
        $data =
            [
                'user_email' => Auth::email(),
                'meassage' => $message,
                'email' => $email,
            ];
        return $this->log->create($data);
    }


}