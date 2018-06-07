<?php

use App\Http\Actions\AdAction;
use App\Repository\AdRecordRepository;
use App\Storage\AdRecordCacheStorage;
use App\Storage\AdRecordDBStorage;
use Framework\Container\Container;
use Framework\Container\ContainerInterface;
use Framework\Http\Request;
use Framework\Http\RequestFactory;
use Framework\Http\RequestInterface;
use Framework\Logger\DummyLogger;
use Framework\Logger\FileLogger;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../legacy/functions.php';

$container = new Container();

############################################

$container->set('config', [
    'log' => true,
    'currency' => 'rub',
]);

############################################

$container->set(\Framework\Logger\LoggerInterface::class, function (ContainerInterface $container) {
    return $container->get('config')['log'] ? new FileLogger('/path/to/file')
                                            : new DummyLogger();
});

$container->set(\Framework\Http\RequestInterface::class, function () {
    return RequestFactory::fromGlobals();
});

$container->set(AdRecordRepository::class, function (ContainerInterface $container) {
    /** @var Request $request */
    $request = $container->get(RequestInterface::class);

    switch ($request->getAttribute('from')) {
        case 'Mysql':
            $adRecordStorage = $container->get(AdRecordDBStorage::class);
            break;
        case 'Daemon':
            $adRecordStorage = $container->get(AdRecordCacheStorage::class);
            break;
        default:
            throw new \InvalidArgumentException('form is required');
    }

    return new AdRecordRepository($adRecordStorage);
});

############################################

$action = new AdAction($container);
$response = $action->show();

header('HTTP/1.0' . $response->getStatusCode());
echo $response->getBody();