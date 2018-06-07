<?php

namespace App\Http\Actions;

use App\Repository\AdRecordRepository;
use App\Repository\CurrencyRepository;
use App\Storage\AdRecordCacheStorage;
use App\Storage\AdRecordDBStorage;
use Framework\Container\ContainerInterface;
use Framework\Http\Request;
use Framework\Http\RequestInterface;
use Framework\Http\Response;
use Framework\Http\ResponseInterface;

class AdAction
{
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function show(): ResponseInterface
    {
        /** @var Request $request */
        $request = $this->container->get(RequestInterface::class);

        if(empty($id = $request->getAttribute('id'))) {
            throw new \InvalidArgumentException('ID is required');
        }

        $adRecord = $this->container->get(AdRecordRepository::class)->findById($id);

        $currency = $this->container->get(CurrencyRepository::class)->findById($this->container->get('config')['currency']);

        return new Response(<<<HTML
    <h1>{$adRecord->getName()}</h1>
    <p>{$adRecord->getText()}</p>
    <p>стоимость: {$adRecord->getPriceByCurrency($currency)} руб</p>
HTML
        );
    }

}