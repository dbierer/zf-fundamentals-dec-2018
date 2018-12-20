<?php
namespace Model;

use Zend\Db\Adapter\Adapter;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'model-adapter' => function ($container, $requestedName) {
                    return new Adapter($container->get('model-db-config'));
                },
            ],
        ];
    }
}
