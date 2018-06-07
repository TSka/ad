<?php

namespace Framework\Logger;

class FileLogger implements LoggerInterface
{
    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function log($message)
    {
        // log into file
    }
}