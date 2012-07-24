<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // Log test
        // Zend_Registry::get('log')->debug('This is a sample debug message');
        // $this->getFrontController()->getParam('bootstrap')->getResource('log')->debug('This is a sample debug message');
        $usersGateway = new Jk_Model_User_Gateway();
        $users = $usersGateway->fetchActive();

        // Zend_Debug::dump($users);

        $this->view->users = $users->getItems();

        
    }


}

