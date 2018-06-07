<?php

namespace App\Storage;

use Framework\Logger\LoggerInterface;
use Framework\Repository\Model;
use Framework\Repository\Storage;

class AdRecordDBStorage implements Storage
{
    public $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function retrieve($id): array
    {
        $this->logger->log(sprintf('%s getAdRecord(ID=%d)', time(), $id));

        return getAdRecord($id);
    }
}