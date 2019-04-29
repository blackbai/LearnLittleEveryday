<?php

interface logger
{
    public function log($message);
}

class StdoutLogger implements logger
{
    public function log($message)
    {
        echo $message;
    }
}

class FileLogger implements logger
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function log($message)
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}


interface LoggerFactory
{
    public function createLogger();
}

class StdoutFactory implements LoggerFactory
{
    public function createLogger()
    {
        return new StdoutLogger();
    }
}

class FileFactory implements LoggerFactory
{

    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger()
    {
        return new FileFactory($this->filePath);
    }
}

$loggerFactory = new StdoutFactory();
$loggerFactory->createLogger();

