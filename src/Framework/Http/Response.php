<?php

namespace Framework\Http;

class Response implements ResponseInterface
{
    public $body;
    public $statusCode;

    public function __construct($body, $status = 200)
    {
        $this->body       = $body;
        $this->statusCode = $status;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }
}