<?php


class SqlMe {


    public static function run() {

        // Define path to application directory
        defined('APPLICATION_PATH')
            || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../application'));

        // Define application environment
        defined('APPLICATION_ENV')
            || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

        require_once 'Zend/Application.php';

        $Application = new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );

        $Application->bootstrap();

        $router = new Zend_Controller_Router_Rewrite();
        $router->removeDefaultRoutes();

        require_once 'SqlMe/Resolver.php';
        $Resolver = SqlMe_Resolver::factory();

        require_once 'SqlMe/Route.php';
        $router->addRoute($Resolver->getRoute(), SqlMe_Route::factory());

        $front  = Zend_Controller_Front::getInstance()
            ->setRouter($router);

        $System = $Application->getBootstrap()->getResource('system');

        $Application->run();

        /*
         * Because of http://codex.wordpress.org/AJAX_in_Plugins#Error_Return_Values
         */
        if ($System->isAjaxRequest()) {
            $System->shutDown();
        }
    }
}