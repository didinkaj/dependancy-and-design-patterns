<?php

namespace Blog\Repositories\Subscriber;
use Blog\Subscriber;
use Auth;


class LogRepository
{
    public $Subscriber;


    function __construct(Subscriber $Subscribers)
    {
        $this->Subscriber = $Subscribers;
    }


    public function getAllBlogs()
    {
        return $this->Subscriber->latest()->paginate(3);

    }


    public function saveLog($message,$email)
    {
        $data =
            [
                'user_email' => Auth::email(),
                'meassage' => $message,
                'email' => $email,
            ];
        return $this->Subscriber->create($data);
    }


}