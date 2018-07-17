<?php
namespace Blog\Logger;

use Blog\Logger\Contracts\SystemLogInterface;

class UserLog implements  SystemLogInterface
{
    public function generateLogs()
    {
        return 'This is an output log from user';
    }
}