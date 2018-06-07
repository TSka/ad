<?php

namespace App\Repository;

class CurrencyRepository
{
    private $data = [
        'rub' => '61,98',
    ];

    public function findById($id): float
    {
        if (!array_key_exists($id, $this->data)) {
            throw new \InvalidArgumentException(sprintf('Currency with ID %s does not exist', $id));
        }

        return $this->data[$id];
    }
}