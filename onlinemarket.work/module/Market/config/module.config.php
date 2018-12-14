<?php
namespace Market;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'market' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/market',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => TRUE,
                'child_routes' => [
                    'post' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'    => '/post[/]',
                            'defaults' => [
                                'controller' => Controller\PostController::class,
                                'action'     => 'index',
                            ],
                        ],
                    ],
                    'view' => [
                        'type' => Literal::class,
                        'options' => [
                            'route'    => '/view',
                            'defaults' => [
                                'controller' => Controller\ViewController::class,
                                'action'     => 'index',
                                'category'   => 'free',
                            ],
                        ],
                        'may_terminate' => TRUE,
                        'child_routes' => [
                            'categories' => [
                                'type' => Segment::class,
                                'options' => [
                                    'route'    => '/categories[/:category]',
                                    'defaults' => [
                                        'action'     => 'index',
                                    ],
                                    'constraints' => [
                                        'category' => '[a-zA-Z0-9]+',
                                    ],
                                ],
                            ],
                            'item' => [
                                'type' => Segment::class,
                                'options' => [
                                    'route'    => '/item[/:itemId]',
                                    'defaults' => [
                                        'action'     => 'item',
                                    ],
                                    'constraints' => [
                                        'itemId' => '[0-9]+',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
		],
	],
	'controllers' => [
		'factories' => [
            Controller\IndexController::class => Controller\Factory\IndexControllerFactory::class,
            Controller\ViewController::class => Controller\Factory\ViewControllerFactory::class,
            Controller\PostController::class => Controller\Factory\PostControllerFactory::class,
		],
	],
    'controller_plugins' => [
		'factories' => [
            Controller\Plugin\DayWeekMonth::class => InvokableFactory::class,
		],
        'aliases' => [
            'dayWeekMonth' => Controller\Plugin\DayWeekMonth::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            Helper\LeftLinks::class => InvokableFactory::class,
        ],
        'aliases' => [
			'leftLinks' => Helper\LeftLinks::class,
        ],
    ],
    'service_manager' => [
        'services' => [
			'test' => __FILE__,
            'categories' => [
				__NAMESPACE__,
            ],
        ],
    ],
];
