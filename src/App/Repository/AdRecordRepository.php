<?php

namespace App\Repository;

use Framework\Repository\Storage;

class AdRecordRepository
{
    private $persistence;

    public function __construct(Storage $persistence)
    {
        $this->persistence = $persistence;
    }

    public function findById(int $id): AdRecord
    {
        $arrayData = $this->persistence->retrieve($id);

        if (is_null($arrayData)) {
            throw new \InvalidArgumentException(sprintf('AdRecord with ID %d does not exist', $id));
        }

        return AdRecord::fromState($arrayData);
    }
}