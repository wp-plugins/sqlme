<?php


class SqlMe_Route extends Zend_Controller_Router_Route {


    public static function factory() {

        require_once 'SqlMe/Resolver.php';

        $Resolver = SqlMe_Resolver::factory();
        return new SqlMe_Route($Resolver->getRoute(), array(
            'controller' => $Resolver->getController(),
            'action' => $Resolver->getAction()
        ));
    }


    public function match($path, $partial = false) {

        require_once 'SqlMe/Resolver.php';
        $Resolver = SqlMe_Resolver::factory();

        return parent::match($Resolver->getRoute(), $partial);
    }
}