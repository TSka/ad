<?php

namespace Framework\Http;

class Request implements RequestInterface
{
    private $query;

    public function __construct(array $query = null)
    {
        $this->query = $query;
    }

    public function getAttribute($name, $default = null)
    {
        return $this->query[$name] ?? $default;
    }
}