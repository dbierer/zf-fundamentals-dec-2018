<?php
namespace Market\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class PostController extends AbstractActionController
{

    const ERROR_POST = 'ERROR: unable to validate item information';
    const ERROR_SAVE = 'ERROR: unable to save item to the database';
    const SUCCESS_POST = 'SUCCESS: item posted OK';

    use PostFormTrait;

    public function indexAction()
    {
        $invalid = FALSE;
        $data = [];
        if ($this->getRequest()->isPost()) {
            $data = $this->params()->fromPost();
            $this->postForm->setData($data);
            if ($this->postForm->isValid()) {
                $this->flashMessenger()->addMessage(self::SUCCESS_POST);
                return $this->redirect()->toRoute('market');
            } else {
                $this->flashMessenger()->addMessage(self::ERROR_POST);
                $invalid = TRUE;
            }
        }
        return new ViewModel(['postForm' => $this->postForm, 'data' => $data, 'invalid' => $invalid]);
    }
}
