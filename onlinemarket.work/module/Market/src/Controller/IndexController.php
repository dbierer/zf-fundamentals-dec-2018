<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
	protected $test;
    protected $categories;
    public function indexAction()
    {
        $userLoggedIn = $this->params()->fromQuery('isLoggedIn', FALSE);
        if(!$userLoggedIn){
            return $this->redirect()->toRoute('home');
        }
        return new ViewModel(array_merge($this->dayWeekMonth(),
										['categories' => $this->categories, 'test' => $this->test]));
    }
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    public function setTest($test)
    {
        $this->test = $test;
    }
}
