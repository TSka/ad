<?php

namespace Framework\Http;

interface RequestInterface
{
    public function getAttribute($name, $default = null);
}