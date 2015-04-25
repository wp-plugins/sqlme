<?php


class SettingsController extends Zend_Controller_Action {


    public function listAction() {

        $System = $this->getFrontController()->getParam('bootstrap')->getResource('System');

        if ($System->isCountingEnabled()) {
            $isCountingEnabled = 'checked="checked"';
        } else {
            $isCountingEnabled = '';
        }

        $this->view->assign('isCountingEnabled', $isCountingEnabled);


        if ($System->isSqlMonitoringEnabled()) {
            $isMonitoringEnabled = 'checked="checked"';
        } else {
            $isMonitoringEnabled = '';
        }

        $this->view->assign('isMonitoringEnabled', $isMonitoringEnabled);
    }


    public function switchMonitoringAction() {

        $this->getHelper('ViewRenderer')->setNoRender();

        $System = SqlMe_System::factory();
        if ($System->getSetting(SqlMe_System::SETTING_SQL_MONITOR)) {
            $System->setSetting(SqlMe_System::SETTING_SQL_MONITOR, false);
        } else {
            $System->setSetting(SqlMe_System::SETTING_SQL_MONITOR, true);
        }
    }


    public function switchCountingAction() {

        $this->getHelper('ViewRenderer')->setNoRender();

        $System = SqlMe_System::factory();
        if ($System->getSetting(SqlMe_System::SETTING_COUNT_PROFILER)) {
            $System->setSetting(SqlMe_System::SETTING_COUNT_PROFILER, false);
        } else {
            $System->setSetting(SqlMe_System::SETTING_COUNT_PROFILER, true);
        }
    }
}