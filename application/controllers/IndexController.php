<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        Zend_Registry::get('Logger')->debug('This is a sample debug message');
        throw new Exception("Error Processing Request", 666);
        
    }


}

