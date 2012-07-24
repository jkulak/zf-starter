<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function _initLogs()
    {
        // $this->bootstrap('log');
        // Init logger
        // $log = $this->bootstrap('log')->getResource('log');

        // Zend_Debug::dump($log);
        // Zend_Registry::set('Logger', $log);

        // return $log;
    }

    public function _initCacheLogging()
    {
        // $cacheManager = $this->bootstrap('cachemanager')->getResource('cachemanager');
        // $logger = $this->bootstrap('log')->getResource('log');

        // how to bootsrap cacheManaer and add bootsrrapper logger?
    }

    /**
     *
     */
    public function _initHead() {

        $this->bootstrap('View');
        $view = $this->getResource('View');

        $view->headMeta()->setName('Description', 'Wyszukane, intrygujące, piękne zdjęcia dla ludzi szukających inspiracji i rozrywki z klasą.');
        $view->headMeta()->setName('Keywords', 'śmieszne zdjęcia, śmieszne fotki, śmieszne obrazki, zdjęcia, fotki, obrazki, oryginalne, inspirujące, poebao');
        $view->headMeta()->setName('robots', 'index,follow');
        $view->headMeta()->setName('author', 'www.webascrazy.net');
        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('zf-starter');
    }

}

