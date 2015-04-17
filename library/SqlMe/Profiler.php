<?php


class SqlMe_Profiler {


    private static $amount = 0;


    public static function up($query) {

        self::$amount ++;
        return $query;
    }


    public static function log() {

        global $wpdb;

        if (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            $host = null;
        }

        if (isset($_SERVER['REQUEST_URI'])) {
            $uri = $_SERVER['REQUEST_URI'];
        } else {
            $uri = null;
        }

        require_once 'SqlMe/Driver.php';

        $Driver = SqlMe_Driver::factory();
        $Driver->execute(
            'INSERT DELAYED INTO `sqlme_count_log` (`host`, `uri`, `amount`) VALUES(%s, %s, %d)',
            array($host, $uri, self::$amount)
        );
    }
}