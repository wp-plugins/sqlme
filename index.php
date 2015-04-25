<?php
/**
 * Plugin Name: SqlMe
 * Plugin URI:
 * Description:
 * Version: 0.9
 * Author: zeleniy
 * Author URI:
 * Text Domain:
 * Domain Path:
 * Network:
 * License: GPLv2 or later
 */


define('LIBRARY_PATH', realpath(dirname(__FILE__) . '/library'));


set_include_path(implode(PATH_SEPARATOR, array(
    LIBRARY_PATH,
    get_include_path(),
)));


require_once 'SqlMe/System.php';


$System = SqlMe_System::factory();
$System->setUp();

if ($System->isCountingEnabled()) {
    require_once 'SqlMe/Profiler.php';
    add_filter('query', array('SqlMe_Profiler', 'up'));
    add_action('shutdown', array('SqlMe_Profiler', 'log'), 0);
}

// if ($System->isSqlMonitoringEnabled()) {
//     require_once 'SqlMe/Profiler.php';
//     add_filter('query', array('SqlMe_Profiler', 'query'), 0);
//     add_action('shutdown', array('SqlMe_Profiler', 'dump'), 0);
//     add_action('wp_footer', array('SqlMe_Profiler', 'dump'), 0);
//     add_action('admin_footer', array('SqlMe_Profiler', 'dump'), 0);
// }

function installPlugin() {

    $System = SqlMe_System::factory();
    $System->setUpTables();
}