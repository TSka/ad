<?php

namespace App\Storage;

use Framework\Logger\LoggerInterface;
use Framework\Repository\Model;
use Framework\Repository\Storage;

class AdRecordCacheStorage implements Storage
{
    public $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function retrieve($id): array
    {
        $this->logger->log(sprintf('%s get_deamon_ad_info(ID=%d)', time(), $id));

        $arrayData = array_combine(
            ['id', 'company_id', 'user_id', 'name', 'text', 'price'],
            explode("\t", get_deamon_ad_info($id))
        );

        return $arrayData;
    }
}