<?php

namespace Tests\Framework\Container;

use Framework\Container\Container;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testPrimitives()
    {
        $container = new Container();

        $container->set($name = 'name', $value = 5);
        self::assertEquals($value, $container->get($name));

        $container->set($name = 'name', $value = new \stdClass());
        self::assertEquals($value, $container->get($name));
    }

    public function testHas()
    {
        $container = new Container();

        $container->set($name = 'name', $value = 5);
        self::assertEquals(true, $container->has($name));
        self::assertEquals(false, $container->has('UnknownService'));
    }

    public function testNotFound()
    {
        $container = new Container();

        $this->expectException(\InvalidArgumentException::class);

        $container->get('UnknownService');
    }
}