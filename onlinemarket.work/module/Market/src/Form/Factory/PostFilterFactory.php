<?php
namespace Market\Form\Factory;

use Market\Form\PostFilter;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class PostFilterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $filter = new PostFilter(
            $container->get('categories'),
            $container->get('market-expire-days')
        );
        return $filter;
    }
}
