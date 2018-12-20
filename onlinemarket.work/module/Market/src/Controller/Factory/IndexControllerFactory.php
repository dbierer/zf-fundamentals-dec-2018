<?php
namespace Market\Controller\Factory;

use Model\Table\Listings;
use Market\Controller\IndexController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class IndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new IndexController();
        $controller->setCategories($container->get('categories'));
        $controller->setTest($container->get('test'));
        $controller->setListingsTable($container->get(Listings::class));
        return $controller;
    }
}
