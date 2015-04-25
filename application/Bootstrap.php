<?php


class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {


    protected function _initSystem() {

        require_once 'SqlMe/System.php';
        return SqlMe_System::factory($this->getApplication());
    }
}