<?php
namespace Firelike\LitRes\Controller\Factory;


use Firelike\LitRes\Controller\ConsoleController;
use Firelike\LitRes\Service\LitResService;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;


class ConsoleControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $sm, $requestedName, array $options = null)
    {

        $service = $sm->get(LitResService::class);

        $controller = new ConsoleController();
        $controller->setService($service);

        return $controller;

    }

}