<?php

namespace Framework\Repository;

interface Storage
{
    public function retrieve($id): array;
}