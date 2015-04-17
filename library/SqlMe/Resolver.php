<?php


abstract class SqlMe_Resolver {


    private static $_resolver;


    public static function factory() {

        require_once 'SqlMe/Resolver/Wordpress.php';

        if (self::$_resolver === null) {
            self::$_resolver = new SqlMe_Resolver_Wordpress();
        }

        return self::$_resolver;
    }


    abstract public function getRoute();


    abstract public function getController();


    abstract public function getAction();
}