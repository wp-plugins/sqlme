<?php


class ServerController extends Zend_Controller_Action {


    public function indexAction() {

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        $this->view->assign('server', $Driver->getVersion());
        $this->view->assign('variables', $Driver->getVariables());
    }
}