<?php
namespace Model;

return [
    'service_manager' => [
        'services' => [
            'model-db-config' => [
                'driver' => 'PDO',
                'dsn'    => 'mysql:host=localhost;dbname=course',
                'username' => 'vagrant',
                'password' => 'vagrant',
            ],
        ],
        'factories' => [
            Table\Listings::class => Table\Factory\ListingsFactory::class,
        ],
    ],
];
