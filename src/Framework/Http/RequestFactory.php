<?php

namespace Framework\Http;

class RequestFactory
{
    public static function fromGlobals(array $query = null): RequestInterface
    {
        return new Request($query ?: $_GET);
    }
}