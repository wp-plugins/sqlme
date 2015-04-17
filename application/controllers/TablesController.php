<?php


class TablesController extends Zend_Controller_Action {


    public function countAction() {

        $this->getHelper('ViewRenderer')->setNoRender();

        $table = $this->_getParam('table');

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        echo $Driver->getTableRowsNumber($table);
    }


    public function listAction() {

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        $tables = $Driver->getTables();
        $totalAmount = '&mdash;';
        foreach ($tables as $table) {
            if (is_numeric($table['amount'])) {
                $totalAmount += $table['amount'];
            }
        }

        $this->view->assign('tables', $tables);
        $this->view->assign('totalAmount', $totalAmount);
    }
}