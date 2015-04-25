<?php


abstract class SqlMe_Driver {


    public static $_dateTimeTypes = array(
        'datetime',
        'timestamp'
    );


    public static function factory() {

        require_once 'SqlMe/Driver/Wordpress.php';
        return new SqlMe_Driver_Wordpress();
    }


    abstract public function describeTable($table);


    abstract public function getDatedTables();


    abstract public function selectCell($query, $args = array());


    abstract public function getAsNumericArray();


    abstract protected function _prepare($query, $args = array());


    abstract public function selectList($query);


    abstract public function selectRow($query, $args = array(), $returnType = ARRAY_A);


    abstract public function execute($query, $args = array());


    abstract public function getProcessList();


    abstract public function getVersion();


    abstract public function getVariables();


    abstract public function getTableEngine($table);


    abstract public function getTableRowsNumber($table);


    abstract public function getTables();
}