<?php


require_once 'SqlMe/SqlMe.php';


class SqlMe_System_Wordpress extends SqlMe_System {


    public function isCountingEnabled() {

        return get_option(SqlMe_System::SETTING_COUNTER) > 0;
    }


    public function getSetting($name) {

        return get_option($name);
    }


    public function setSetting($name, $value) {

        update_option($name, $value);
    }


    public function setUp() {

        add_action('admin_menu', array($this, 'setUpMenu'));
        register_activation_hook('SqlMe/index.php', 'installPlugin');

        if (isset($_REQUEST['action']) && ! empty($_REQUEST['action'])) {
            add_action('wp_ajax_' . $_REQUEST['action'], array('SqlMe', 'run'));
        }
    }


    public function setUpTables() {

        require_once 'SqlMe/Driver.php';

        $Driver = SqlMe_Driver::factory();
        $Driver->execute('CREATE TABLE IF NOT EXISTS `sqlme_count_log` (
            `host` varchar(32) DEFAULT NULL,
            `uri` varchar(256) DEFAULT NULL,
            `amount` smallint(6) DEFAULT NULL,
            `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            KEY `date` (`date`)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8');
    }


    public function setUpMenu() {

        add_menu_page('sqlMe', 'SqlMe', 'administrator', 'sqlme', array('SqlMe', 'run'));
    }


    public function shutDown() {

        wp_die();
    }


    public function isAjaxRequest() {

        return defined('DOING_AJAX');
    }
}
