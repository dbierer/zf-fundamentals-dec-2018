<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    public function indexAction()
    {
        $category = $this->params()->fromRoute('category');
        return new ViewModel(['category' => $category]);
    }
    public function itemAction()
    {
        $itemId = $this->params()->fromRoute('itemId', 1);
        return new ViewModel(['itemId' => $itemId]);
    }
}
