<?php


class SqlMe_Resolver_Wordpress extends SqlMe_Resolver {


    private $_route;
    private $_controller;
    private $_action;


    public function __construct() {

        if (isset($_GET['page']) && ! empty($_GET['page']) && $_GET['page'] == 'sqlme') {

            $this->_route = 'sqlme';
            $this->_controller = 'Server';
            $this->_action = 'index';
        } elseif (isset($_REQUEST['action']) && ! empty($_REQUEST['action'])) {

            $this->_route = $_REQUEST['action'];
            $parts = explode('_', $_REQUEST['action']);

            if (isset($parts[1])) {
                $this->_controller = $parts[1];
            } else {
                $this->_controller = 'Server';
            }

            if (isset($parts[2])) {
                $this->_action = $parts[2];
            } else {
                $this->_action = 'index';
            }
        }
    }


    public function getRoute() {

        return $this->_route;
    }


    public function getController() {

        return $this->_controller;
    }


    public function getAction() {

        return $this->_action;
    }
}