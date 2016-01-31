<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Model\Clientes;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $clientes = $this->getServiceLocator()->get('Application\Model\ClientesTable')->findAll();
        return new ViewModel(['clientes'=>$clientes]);
    }

    public function createAction()
    {
        if($this->getRequest()->isPost()){

            $data = $this->params()->fromPost();
            $cliente = new Clientes();
            $cliente->exchangeArray($data);
            $table = $this->getServiceLocator()
                          ->get('Application\Model\ClientesTable')
                          ->insert($cliente);
            return $this->redirect()->toUrl('/application/index/index');

        }
        return new ViewModel();

    }

    public function editAction()
    {
        $cliente = $this->getServiceLocator()
            ->get('Application\Model\ClientesTable')
            ->find($this->params()->fromRoute('id'));

        if($this->getRequest()->isPost()){

            $data = $this->params()->fromPost();
            $data['id'] = $this->params()->fromRoute('id');
            $cliente = new Clientes();
            $cliente->exchangeArray($data);
            $table = $this->getServiceLocator()
                ->get('Application\Model\ClientesTable')
                ->update($cliente);
            return $this->redirect()->toUrl('/application/index/index');

        }

        return new ViewModel(['cliente'=>$cliente]);

    }

    public function deleteAction()
    {

        if($this->getServiceLocator()
            ->get('Application\Model\ClientesTable')
            ->find($this->params()->fromRoute('id'))){
            $this->getServiceLocator()
                ->get('Application\Model\ClientesTable')
                ->delete($this->params()->fromRoute('id'));
            return $this->redirect()->toUrl('/application/index/index');

        }


    }
    
}
