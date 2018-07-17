<?php
namespace Blog\Logger;

use Blog\Logger\Contracts\SystemLogInterface;

use Blog\Repositories\Log\LogRepository;


class SystemLog implements  SystemLogInterface
{
    public  $logrepo;

    public function __construct(LogRepository $logRepositoryInstance)
    {
        $this->logrepo = $logRepositoryInstance;
    }

    public function generateLogs( $message )
    {
        $msg = $message;
        $this->logrepo->saveLog($msg);
        return 'This is an output log from system Created';
    }
}