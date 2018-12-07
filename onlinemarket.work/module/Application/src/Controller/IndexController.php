<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function urlAction()
    {
		echo '<br>' . $this->url()->fromRoute('home');
		echo '<br>' . $this->url()->fromRoute('application');
		echo '<br>' . $this->url()->fromRoute('market');
		return $this->forward()->dispatch(IndexController::class, ['action' => 'index']);
    }
    public function getAction()
    {
		echo '<br>' . $this->params()->fromQuery('test', 'N/A');
		return $this->forward()->dispatch(IndexController::class, ['action' => 'index']);
    }
    public function requestAction()
    {
		echo '<pre>' . var_export($this->getRequest(), TRUE) . '</pre>';
		return $this->forward()->dispatch(IndexController::class, ['action' => 'index']);
    }
    public function responseAction()
    {
		$response = $this->getResponse();
		$response->setBody('<h1>Non Standard Resonse</h1>');
		return $response;
    }
}