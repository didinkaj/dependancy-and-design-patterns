<?php

namespace Blog\Repositories\Log;


interface LogRepositoryInterface
{
    public function getAllBlogs();

    public function saveLog($message);

    public function logNumber();

}