<?php
namespace Model\Table\Factory;

use Model\Table\Listings;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class ListingsFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Listings(Listings::TABLE_NAME, $container->get('model-adapter'));
    }
}
