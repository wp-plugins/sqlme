<?php


abstract class SqlMe_System {


    const SETTING_COUNT_PROFILER = 'sqlme-count-profiler';
    const SETTING_SQL_MONITOR = 'sqlme-sql-monitor';


    public static function factory() {

        require_once 'SqlMe/System/Wordpress.php';
        return new SqlMe_System_Wordpress();
    }


    abstract public function isAdmin();


    abstract public function isSqlMonitoringEnabled();


    abstract public function isCountingEnabled();


    abstract public function setUp();


    abstract public function shutDown();


    abstract public function isAjaxRequest();


    abstract public function setUpMenu();


    abstract public function setUpTables();


    abstract public function getSetting($name);


    abstract public function setSetting($name, $value);
}