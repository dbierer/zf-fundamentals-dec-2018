<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\MvcEvent;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
    public function onBootstrap(MvcEvent $e)
    {
		// gives us the MVC event manager
		$em = $e->getApplication()->getEventManager();
		$em->addIdentifiers(['ID209']);
		$shared = $em->getSharedManager();
		// NOTE: if you use "*" instead of a specific identifier, the attach will apply to ALL event managers:
		//$shared->attach('*', 'whatever', [$this, 'whateverListener'], 2);
		$shared->attach('ID209', 'whatever', [$this, 'whateverListener'], 2);
		// uncomment this line to have the event triggered right away
		//$em->trigger('whatever', $this, ['class' => __METHOD__]);
	}
	public function whateverListener($e)
	{
		echo '<br>' . __METHOD__;
		echo '<br>' . $e->getName();
		echo '<br>' . get_class($e->getTarget());
		echo '<br>' . var_export($e->getParams(), TRUE);
	}
	public function getServiceConfig()
	{
		return [
			'factories' => [
				'application-db-adapter' => function ($container) {
					return new \Zend\Db\Adapter\Adapter($container->get('application-db-config'));
				},
			],
		];
	}
}
