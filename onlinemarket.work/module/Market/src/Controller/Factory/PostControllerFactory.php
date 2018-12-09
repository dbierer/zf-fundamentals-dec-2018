<?php
namespace Market\Controller\Factory;

use Market\Form\PostForm;
use Market\Controller\PostController;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Session\Container;

class PostControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $controller = new PostController();
        return $controller;
    }
}
