<?php
namespace Blog\Logger\Contracts;

/*
 * Strategy design pattern
 * */

Interface  SystemLogInterface
{
    public function generateLogs($message);
}