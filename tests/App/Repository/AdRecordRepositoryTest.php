<?php

namespace Tests\App\Repository;

use App\Repository\AdRecordRepository;
use Framework\Repository\Storage;
use PHPUnit\Framework\TestCase;

class AdRecordRepositoryTest extends TestCase
{
    public function testFindRecord()
    {
        $storage = $this->createMock(Storage::class);
        $storage->expects($this->once())
            ->method('retrieve')
            ->will($this->returnValue([]));

        $repository = new AdRecordRepository($storage);
        $repository->findById(1);
    }
}