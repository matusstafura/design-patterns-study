<?php

interface Logger
{
    public function save(string $message): void;
}

class FileLogger implements Logger
{
    public function save(string $message): void
    {
        echo "log has been saved in a file";
    }
}

class DBLogger implements Logger
{
    public function save(string $message): void
    {
        echo "log has been saved in a db";
    }
}

abstract class Importance
{
    public function __construct(protected Logger $logger)
    {
    }

    abstract public function saveLog(string $content);
}

class ErrorLog extends Importance
{
    public function saveLog(string $content)
    {
        echo "ERROR: ";
        $this->logger->save($content);
        echo "\n";
    }
}

class NoticeLog extends Importance
{
    public function saveLog(string $content)
    {
        echo "NOTICE: ";
        $this->logger->save($content);
        echo "\n";
    }
}

$fileLogger = new FileLogger();
$noticeLog = new NoticeLog($fileLogger);
$noticeLog->saveLog("a record has been updated.");

$dbLogger = new DBLogger();
$errorLog = new ErrorLog($dbLogger);
$errorLog->saveLog("Can not connect to db");

