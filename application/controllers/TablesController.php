<?php


class TablesController extends Zend_Controller_Action {


    public function countAction() {

        $this->getHelper('ViewRenderer')->setNoRender();

        $table = $this->_getParam('table');

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        echo $Driver->getTableRowsNumber($table);
    }


    public function trendAction() {

        $this->getHelper('ViewRenderer')->setNoRender();
        $this->_response->setHeader('Content-type', 'application/json');

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        $table = $this->_getParam('table');
        $field = $this->_getParam('field');
        $from  = preg_replace('/(\d\d)\/(\d\d)\/(\d\d\d\d)/', '$3-$2-$1', $this->_getParam('from'));
        $to    = preg_replace('/(\d\d)\/(\d\d)\/(\d\d\d\d)/', '$3-$2-$1', $this->_getParam('to'));

        $statistics = array(
            'key'    => $table . '.' . $field,
            'values' => array()
        );

        $daysDiff = abs($Driver->selectCell('SELECT DATEDIFF(\'' . $from . '\', \'' . $to . '\')'));

        $date = $from;
        $counts = array();
        for ($i = $daysDiff; $i >= 0; $i --) {

            $sqlQuery = 'SELECT COUNT(*) FROM ' . $table . ' WHERE DATE(' . $field . ')=\'' . $date . '\'';
            $count = $Driver->selectCell($sqlQuery);

            $counts[] = $count;
            $statistics['values'][] = array(
                'x' => $date,
                'y' => $count
            );

            $date = $Driver->selectCell('SELECT DATE_ADD(\'' . $date . '\', INTERVAL 1 DAY)');
        }

        if (count($counts) == 0) {
            $average = '0.00';
        } else {
            $average = round(array_sum($counts) / count($counts), 2);
        }

        echo json_encode(array(
            'statistics' => array($statistics),
            'average'    => $average
        ));
    }


    public function listAction() {

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();

        $datedTables = $Driver->getDatedTables();
        $tables = $Driver->getTables();

        $totalAmount = '&mdash;';
        foreach ($tables as $table) {
            if (is_numeric($table['amount'])) {
                $totalAmount += $table['amount'];
            }
        }

        $this->view->assign('tables', $tables);
        $this->view->assign('datedTables', $datedTables);
        $this->view->assign('totalAmount', $totalAmount);
    }
}