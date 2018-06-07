<?php

namespace Framework\Http;

interface ResponseInterface
{
    public function getBody();

    public function getStatusCode();
}