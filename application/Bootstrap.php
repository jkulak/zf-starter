<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initApplication()
    {
        // Init logger
        Zend_Registry::set('Logger', $this->bootstrap('log')->getResource('log'));
    }

}

