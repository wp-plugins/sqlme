<?php


class ProcessController extends Zend_Controller_Action {


    public function listAction() {

        $this->getHelper('ViewRenderer')->setNoRender();
        $this->_response->setHeader('Content-type', 'application/json');

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        $queries = $Driver->getProcessList();
//         $queries = array();
//         $queries[]['Info'] = "SET NAMES utf8";
//         $queries[]['Info'] = "SELECT @@SESSION.sql_mode";
//         $queries[]['Info'] = "SELECT option_name, option_value FROM wp_options WHERE autoload = 'yes'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'WPLANG' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'theme_mods_twentyfifteen' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'current_theme' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'mods_Twenty Fifteen' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_pages' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_calendar' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_tag_cloud' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_nav_menu' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_timeout_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_transient_doing_cron'";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_transient_timeout_doing_cron'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "INSERT INTO `wp_options` (`option_name`, `option_value`, `autoload`) VALUES ('_transient_doing_cron', '1429272555.4727649688720703125000', 'yes') ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`), `autoload` = VALUES(`autoload`)";
//         $queries[]['Info'] = "SELECT @@SESSION.sql_mode";
//         $queries[]['Info'] = "SELECT option_name, option_value FROM wp_options WHERE autoload = 'yes'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'WPLANG' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'theme_mods_twentyfifteen' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'current_theme' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'mods_Twenty Fifteen' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_pages' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_calendar' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_tag_cloud' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'widget_nav_menu' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'theme_switched' LIMIT 1";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:6:{i:1429211280;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429236879;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429236880;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:5:{i:1429236879;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429236880;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "INSERT IGNORE INTO `wp_options` ( `option_name`, `option_value`, `autoload` ) VALUES ('auto_updater.lock', '1429272556', 'no') /* LOCK */";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'auto_updater.lock' LIMIT 1";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = '1429272556' WHERE `option_name` = 'auto_updater.lock'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1429272556;}' WHERE `option_name` = '_site_transient_update_plugins'";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_site_transient_theme_roots'";
//         $queries[]['Info'] = "DELETE FROM wp_options WHERE option_name = '_site_transient_theme_roots'";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_site_transient_timeout_theme_roots'";
//         $queries[]['Info'] = "DELETE FROM wp_options WHERE option_name = '_site_transient_timeout_theme_roots'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'theme_switched' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = 'rewrite_rules' LIMIT 1";
//         $queries[]['Info'] = "SELECT SQL_CALC_FOUND_ROWS  wp_posts.ID FROM wp_posts  WHERE 1=1  AND wp_posts.post_type = 'post' AND (wp_posts.post_status = 'publish')  ORDER BY wp_posts.post_date DESC LIMIT 0, 10";
//         $queries[]['Info'] = "SELECT FOUND_ROWS()";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_site_transient_theme_roots' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_site_transient_timeout_theme_roots' LIMIT 1";
//         $queries[]['Info'] = "INSERT INTO `wp_options` (`option_name`, `option_value`, `autoload`) VALUES ('_site_transient_timeout_theme_roots', '1429274356', 'yes') ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`), `autoload` = VALUES(`autoload`)";
//         $queries[]['Info'] = "INSERT INTO `wp_options` (`option_name`, `option_value`, `autoload`) VALUES ('_site_transient_theme_roots', 'a:3:{s:13:\"twentyfifteen\";s:7:\"/themes\";s:14:\"twentyfourteen\";s:7:\"/themes\";s:14:\"twentythirteen\";s:7:\"/themes\";}', 'yes') ON DUPLICATE KEY UPDATE `option_name` = VALUES(`option_name`), `option_value` = VALUES(`option_value`), `autoload` = VALUES(`autoload`)";
//         $queries[]['Info'] = "SELECT wp_posts.* FROM wp_posts WHERE ID IN (1)";
//         $queries[]['Info'] = "SELECT t.*, tt.*, tr.object_id FROM wp_terms AS t INNER JOIN wp_term_taxonomy AS tt ON tt.term_id = t.term_id INNER JOIN wp_term_relationships AS tr ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy IN ('category', 'post_tag', 'post_format') AND tr.object_id IN (1) ORDER BY t.name ASC";
//         $queries[]['Info'] = "SELECT post_id, meta_key, meta_value FROM wp_postmeta WHERE post_id IN (1) ORDER BY meta_id ASC";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1429272557;s:7:\"checked\";a:3:{s:13:\"twentyfifteen\";s:3:\"1.0\";s:14:\"twentyfourteen\";s:3:\"1.3\";s:14:\"twentythirteen\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}' WHERE `option_name` = '_site_transient_update_themes'";
//         $queries[]['Info'] = "SELECT   wp_posts.ID FROM wp_posts  WHERE 1=1  AND wp_posts.post_type = 'post' AND ((wp_posts.post_status = 'publish'))  ORDER BY wp_posts.post_date DESC LIMIT 0, 5";
//         $queries[]['Info'] = "SELECT * FROM wp_users WHERE ID = '1'";
//         $queries[]['Info'] = "SELECT user_id, meta_key, meta_value FROM wp_usermeta WHERE user_id IN (1) ORDER BY umeta_id ASC";
//         $queries[]['Info'] = "SELECT * FROM wp_comments JOIN wp_posts ON wp_posts.ID = wp_comments.comment_post_ID WHERE ( comment_approved = '1' ) AND  wp_posts.post_status = 'publish'  ORDER BY comment_date_gmt DESC LIMIT 5";
//         $queries[]['Info'] = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM wp_posts  WHERE post_type = 'post' AND post_status = 'publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.1.1.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.1.1.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.1.1-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.1.1-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.1.1\";s:7:\"version\";s:5:\"4.1.1\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.1\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1429272557;s:15:\"version_checked\";s:5:\"4.1.1\";s:12:\"translations\";a:0:{}}' WHERE `option_name` = '_site_transient_update_core'";
//         $queries[]['Info'] = "SELECT t.*, tt.* FROM wp_terms AS t INNER JOIN wp_term_taxonomy AS tt ON t.term_id = tt.term_id WHERE tt.taxonomy IN ('category') AND tt.count > 0 ORDER BY t.name ASC";
//         $queries[]['Info'] = "INSERT DELAYED INTO `sqlme_count_log` (`host`, `uri`, `amount`) VALUES('wordpress', '/', 26)";
//         $queries[]['Info'] = "SELECT COUNT(NULLIF(`meta_value` LIKE '%\"administrator\"%', false)), COUNT(NULLIF(`meta_value` LIKE '%\"editor\"%', false)), COUNT(NULLIF(`meta_value` LIKE '%\"author\"%', false)), COUNT(NULLIF(`meta_value` LIKE '%\"contributor\"%', false)), COUNT(NULLIF(`meta_value` LIKE '%\"subscriber\"%', false)), COUNT(*) FROM wp_usermeta WHERE meta_key = 'wp_capabilities'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1429272557;s:7:\"checked\";a:3:{s:13:\"twentyfifteen\";s:3:\"1.0\";s:14:\"twentyfourteen\";s:3:\"1.3\";s:14:\"twentythirteen\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}' WHERE `option_name` = '_site_transient_update_themes'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1429272557;}' WHERE `option_name` = '_site_transient_update_plugins'";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = 'auto_updater.lock'";
//         $queries[]['Info'] = "DELETE FROM wp_options WHERE option_name = 'auto_updater.lock'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:6:{i:1429236879;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429236880;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:5:{i:1429236880;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:6:{i:1429236880;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280080;a:1:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:6:{i:1429236880;a:1:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280080;a:1:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":1:{s:12:\"last_checked\";i:1429272558;}' WHERE `option_name` = '_site_transient_update_plugins'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:6:{i:1429236880;a:1:{s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280080;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'a:5:{i:1429280079;a:1:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280080;a:2:{s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1429280113;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1429297680;a:1:{s:20:\"wp_maybe_auto_update\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}s:7:\"version\";i:2;}' WHERE `option_name` = 'cron'";
//         $queries[]['Info'] = "UPDATE `wp_options` SET `option_value` = 'O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1429272558;s:7:\"checked\";a:3:{s:13:\"twentyfifteen\";s:3:\"1.0\";s:14:\"twentyfourteen\";s:3:\"1.3\";s:14:\"twentythirteen\";s:3:\"1.4\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}}' WHERE `option_name` = '_site_transient_update_themes'";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "SELECT option_value FROM wp_options WHERE option_name = '_transient_doing_cron' LIMIT 1";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_transient_doing_cron'";
//         $queries[]['Info'] = "DELETE FROM wp_options WHERE option_name = '_transient_doing_cron'";
//         $queries[]['Info'] = "SELECT autoload FROM wp_options WHERE option_name = '_transient_timeout_doing_cron'";
//         $queries[]['Info'] = "INSERT DELAYED INTO `sqlme_count_log` (`host`, `uri`, `amount`) VALUES('wordpress', '/wp-cron.php?doing_wp_cron=1429272555.4727649688720703125000', 46)";
//         $queries[]['Info'] = "SELECT 1";
//         $queries[]['Info'] = "SELECT DISTINCT * FROM wp_posts WHERE `uri` LIKE '%ajax%' ORDER BY `date` ASC LIMIT 0, 20";
//         $queries[]['Info'] = "SELECT uri FROM (SELECT host, uri FROM sqlme_count_log)";
//         $queries[]['Info'] = "SELECT * FROM sqlme_count_log, wp_commentmeta WHERE `uri` LIKE '%ajax%'";
//         $queries[]['Info'] = "INSERT INTO sqlme_count_log (a, b, c) VALUES (1, 2, 3) ON DUPLICATE KEY UPDATE id=LAST_INSERT_ID(id), c = 3";
//         $queries[]['Info'] = "DELETE FROM sqlme_count_log WHERE a = 1";
//         $queries[]['Info'] = 'REPLACE INTO wp_postmeta (a, b, c) VALUES (1, 2, 3)';
//         $queries[]['Info'] = "SHOW VARIABLES";
//         $queries[]['Info'] = "SHOW TABLES";
//         $queries[]['Info'] = "SHOW PROCESSLIST";
//         $queries[]['Info'] = "(SELECT 1 FROM wp_commentmeta) UNION (SELECT 2 FROM wp_comments, wp_postmeta)";
//         $queries[]['Info'] = 'SELECT a, b, c FROM wp_commentmeta commentmeta
//             JOIN (SELECT d, max(f) max_f FROM wp_commentmeta WHERE id = 37 GROUP BY d) `subqry` on subqry.d = commentmeta.d
//             WHERE d > 5;';
//         $queries[]['Info'] = 'SELECT DISTINCT 1 + 2 c1, 1+ 2 AS `c2`, sum(c2), "Status" = CASE
//             WHEN quantity > 0 THEN "in stock"
//             ELSE "out of stock"
//             END, t4.c1, (SELECT c1 + c2 FROM wp_users table LIMIT 1) AS subquery INTO @a1, @a2, @a3 FROM `wp_posts` the_t1
//             LEFT OUTER JOIN wp_terms USING(c1, c2) JOIN
//             (SELECT a, b, LENGTH(CONCAT(a, b, c)) FROM (SELECT 1 a,2 b,3 c FROM wp_posts) wp_posts) subquery_in_from
//             JOIN wp_usermeta as tX on tX.c1 = the_t1.c1 NATURAL JOIN wp_links t4_x USING(cX)
//             WHERE c1 = 1 AND c2 IN(1,2,3, "apple") AND EXISTS(SELECT 1 FROM wp_users another_table WHERE x > 1)
//             AND ("zebra" = "orange" OR 1 = 1) GROUP BY 1, 2 HAVING SUM(c2) > 1 ORDER BY 2, c1 DESC LIMIT 0, 10
//             INTO outfile "/xyz" FOR UPDATE LOCK IN SHARE MODE
//             UNION ALL
//             SELECT NULL,NULL,NULL,NULL,NULL FROM wp_postmeta LIMIT 1';


        $this->view->assign('processlist', $Driver->getProcessList());
        $processList = $this->view->render('process/list.phtml');

        /*
         * Register PHP-SQL-Parser class loader.
         */
        spl_autoload_register(array($this, '_autoloadPhpSqlParser'));
        set_include_path(get_include_path() . PATH_SEPARATOR . WP_PLUGIN_DIR . '/SqlMe/library/PHPSQLParser/src');
        require_once 'PHPSQLParser/PHPSQLParser.php';

        /*
         * Parse queries into proper data format.
         */
        $errors = array();
        $tablesList = array();
        $statistics = array();
        foreach ($queries as $query) {

            if ($query['Command'] != 'Query') {
                continue;
            }

            try {
                $parser = new \PHPSQLParser\PHPSQLParser();
                $data   = $parser->parse($query['Info']);
                $query  = SqlMe_Query::factory($data);

                foreach ($query->getStatistics() as $query) {
                    foreach ($query as $type => $tables) {

                        if (! isset($statistics[$type])) {
                            $statistics[$type] = array(
                                'key'    => $type,
                                'values' => array()
                            );
                        }

                        foreach ($tables as $table) {

                            $table = $this->_getNormalizedTableName($table);
                            if (! in_array($table, $tablesList)) {
                                $tablesList[] = $table;
                            }

                            if (! array_key_exists($table, $statistics[$type]['values'])) {
                                $statistics[$type]['values'][$table] = array(
                                    'x' => $table,
                                    'y' => 1
                                );
                            } else {
                                $statistics[$type]['values'][$table]['y'] ++;
                            }
                        }
                    }
                }

            } catch (Exception $e) {
                $errors[] = sprintf('%s [%s]', $e->getMessage(), $query['Info']);
            }
        }

        /*
         * Munge data into very proper format.
         */
        $allTables  = array_map(array($this, '_getTableNames'), $Driver->getTables());
        $tablesList = array_merge($tablesList, $allTables);
        $tablesList = array_unique($tablesList, SORT_STRING);
        foreach ($statistics as $query => & $queryData) {
            $queryTables = array_keys($queryData['values']);
            foreach ($tablesList as $table) {
                if (in_array($table, $queryTables)) {
                    $tableData = $queryData['values'][$table];
                    unset($queryData['values'][$table]);
                    $queryData['values'][] = $tableData;
                } else {
                    $queryData['values'][] = array(
                        'x' => $table,
                        'y' => 0
                    );
                }
            }
        }

//         echo json_encode(array_values($statistics));
        echo json_encode(array(
            'processlist' => $processList,
            'statistics'  => array_values($statistics),
            'errors'      => $errors
        ));
    }


    private function _getTableNames($table) {

        return $table['name'];
    }


    private function _getNormalizedTableName($table) {

        if ($table === null) {
            return '%system%';
        }

        return str_replace('`', '', $table);
    }


    private function _autoloadPhpSqlParser($className) {

        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';

        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }

        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        require_once $fileName;
    }
}