<?php
namespace Market;

use Market\Event\MarketEvent;
use Zend\Mvc\MvcEvent;

class Module
{
	protected $container;
    // the "/data/logs" directory must exist and be writeable by PHP
	public function getConfig()
	{
		return include __DIR__ . '/../config/module.config.php';
	}
	public function getServiceConfig()
	{
		return [
			'services' => [
				'test' => __FILE__,
				'market-log-file' => __DIR__ . '/../../../data/logs/market.log',
			],
		];
	}
    public function onBootstrap(MvcEvent $e)
    {
		$this->container = $e->getApplication()->getServiceManager();
        $em = $e->getApplication()->getEventManager();
        $em->attach(MvcEvent::EVENT_DISPATCH, [$this, 'injectCategoriesListener'], 100);
        // these two attachments will work if the controller triggers using the Mvc eventmanager:
        //$em->attach(MarketEvent::EVENT_POST_VALID, [$this, 'validPostListener']);
        //$em->attach(MarketEvent::EVENT_POST_INVALID, [$this, 'invalidPostListener']);
        $shared = $em->getSharedManager();
        $shared->attach('*', MarketEvent::EVENT_POST_VALID, [$this, 'validPostListener']);
        $shared->attach('*', MarketEvent::EVENT_POST_INVALID, [$this, 'invalidPostListener']);
    }
    public function injectCategoriesListener($e)
    {
        $container = $e->getApplication()->getServiceManager();
        $layoutViewModel = $e->getViewModel();
        $layoutViewModel->setVariable('categories', $container->get('categories'));
    }
    public function validPostListener($e)
    {
        $line = $e->getParam('line', 0);
        $file = $e->getParam('file', 'N/A');
        $this->logSomething($line, $file, MarketEvent::SUCCESS_POST);
    }
    public function invalidPostListener($e)
    {
        $line = $e->getParam('line', 0);
        $file = $e->getParam('file', 'N/A');
        $this->logSomething($line, $file, MarketEvent::ERROR_POST);
    }
    protected function logSomething($line, $file, $message)
    {
        // error log s/be at "/home/vagrant/Zend/workspaces/DefaultWorkspace/onlinemarket/data/logs/market.log"
        $message = date('Y-m-d H:i:s') . ' : File : ' . $file . ' : Line : ' . $line . ' : ' . $message . PHP_EOL;
        $logFile = $this->container->get('market-log-file');
        error_log($message, 3, $logFile);
    }
}



