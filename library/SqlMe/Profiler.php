<?php


class SqlMe_Profiler {


    private static $_amount = 0;
    private static $_queries = array();
    private static $_id = 0;


    public static function up($query) {

        self::$_amount ++;
        return $query;
    }


    public static function dump() {

        $System = SqlMe_System::factory();

        if (! ($System->isAdmin() && ! $System->isAjaxRequest())) {
            return;
        }

        require_once 'Zend/View.php';

        $View = new Zend_View();
        $View->setScriptPath(ABSPATH . 'wp-content/plugins/SqlMe/application/views/scripts/monitor');

        $View->assign('queries', self::$_queries);

        echo $View->render('sql.php');
//         var_dump($View->render('sql.php'));
    }


    public static function query($sqlQuery) {

        self::$_queries[] = array(
            'Id'   => ++ self::$_id,
            'Info' => $sqlQuery
        );

        return $sqlQuery;
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
            array($host, $uri, self::$_amount)
        );
    }
}