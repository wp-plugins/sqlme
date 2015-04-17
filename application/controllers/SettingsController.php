<?php


class SettingsController extends Zend_Controller_Action {


    public function listAction() {

        $System = $this->getFrontController()->getParam('bootstrap')->getResource('System');

        if ($System->getSetting(SqlMe_System::SETTING_COUNTER) > 0) {
            $isEnabled = 'checked="checked"';
        } else {
            $isEnabled = '';
        }

        $this->view->assign('isCountingEnabled', $isEnabled);
    }


    public function switchCountingAction() {

        $this->getHelper('ViewRenderer')->setNoRender();

        $System = $this->getFrontController()->getParam('bootstrap')->getResource('System');
        if ($System->getSetting(SqlMe_System::SETTING_COUNTER)) {
            $System->setSetting(SqlMe_System::SETTING_COUNTER, false);
        } else {
            $System->setSetting(SqlMe_System::SETTING_COUNTER, true);
        }
    }
}