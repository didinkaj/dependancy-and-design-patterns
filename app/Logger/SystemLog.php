<?php
namespace Blog\Logger;

use Blog\Logger\Contracts\SystemLogInterface;

class SystemLog implements  SystemLogInterface
{
    public function generateLogs()
    {
        return 'This is an output log from system';
    }
}