<?php


abstract class SqlMe_System {


    const SETTING_COUNTER = 'sqlme-profile-enabled';


    public static function factory() {

        require_once 'SqlMe/System/Wordpress.php';
        return new SqlMe_System_Wordpress();
    }


    abstract public function isCountingEnabled();


    abstract public function setUp();


    abstract public function shutDown();


    abstract public function isAjaxRequest();


    abstract public function setUpMenu();


    abstract public function setUpTables();


    abstract public function getSetting($name);


    abstract public function setSetting($name, $value);
}