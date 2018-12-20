<?php
namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    use ListingsTableTrait;
    public function indexAction()
    {
        $category = $this->params()->fromRoute('category');
        return new ViewModel(['category' => $category, 'listing' => $this->listingsTable->findByCategory($category)]);
    }
    public function itemAction()
    {
        $itemId = $this->params()->fromRoute('itemId', 1);
        return new ViewModel(['item' => $this->listingsTable->findItemById($itemId)]);
    }
}
