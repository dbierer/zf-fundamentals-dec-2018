<?php
namespace Market\Controller\Factory;

use Model\Table\Listings;
use Market\Controller\ViewController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ViewControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new ViewController();
        $controller->setListingsTable($container->get(Listings::class));
        return $controller;
    }
}
