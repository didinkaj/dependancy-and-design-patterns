<?php

namespace Blog\Logger\Factory;

use Blog\Logger\SystemLog;

use Blog\Logger\AllLogs;

use Blog\Logger\UserLog;




class LoggingFactory
{
    /*
     * simply creates objects of classes
     * */
    public function viewLog($type = "")
    {

        switch ($type) {
            case 'system':
                return new SystemLog();
            case 'user':
                return new  UserLog();
            case 'all':
                return new  AllLogs();
        }

    }
}
