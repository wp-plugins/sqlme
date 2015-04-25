<?php


class SqlMe_Driver_Wordpress extends SqlMe_Driver {


    public function describeTable($table) {

        global $wpdb;
        return $wpdb->get_results('DESCRIBE ' . $table);
    }


    public function getDatedTables() {

        $datedTables = array();

        $tables = $this->getTables();
        foreach ($tables as $table) {

            $datedColumns = array();
            $columns = $this->describeTable($table['name']);
            foreach ($columns as $column) {
                if (in_array($column->Type, SqlMe_Driver::$_dateTimeTypes)) {
                    $datedColumns[] = $column->Field;
                }
            }

            if (count($datedColumns) > 0) {
                $datedTables[$table['name']] = $datedColumns;
            }
        }

        return $datedTables;
    }


    public function getAsNumericArray() {

        return ARRAY_N;
    }


    public function selectRow($query, $args = array(), $returnType = ARRAY_A) {

        global $wpdb;

        $query = $this->_prepare($query, $args);
        return $wpdb->get_row($query, $returnType);
    }


    public function selectCell($query, $args = array()) {

        global $wpdb;

        $query = $this->_prepare($query, $args);
        return $wpdb->get_var($query, 0, 0);
    }


    protected function _prepare($query, $args = array()) {

        global $wpdb;

        if (count($args) == 0) {
            return $query;
        }

        $query = $wpdb->prepare($query, $args);
        return $query;
        return strtr($query, array('\'\'' => 'NULL'));
    }


    public function selectList($query, $args = array(), $returnType = ARRAY_A) {

        global $wpdb;

        $query = $this->_prepare($query, $args);
        return $wpdb->get_results($query, $returnType);
    }


    public function execute($query, $args = array()) {

        global $wpdb;

        $query = $this->_prepare($query, $args);
        return $wpdb->query($query);
    }


    public function getProcessList() {

        global $wpdb;
        return $wpdb->get_results('SHOW FULL PROCESSLIST', ARRAY_A);
    }


    public function getTableEngine($table) {

        global $wpdb;

        $Status = $wpdb->get_row('SHOW TABLE STATUS WHERE Name=\'' . $table . '\'');
        return $Status->Engine;
    }


    public function getTableRowsNumber($table) {

        global $wpdb;

        return $wpdb->get_var('SELECT COUNT(*) FROM ' . $table, 0, 0);
    }


    public function getTables() {

        global $wpdb;

        $tables = array();
        foreach ($wpdb->get_col('SHOW TABLES') as $table) {

            $engine = $this->getTableEngine($table);
            if ($engine == 'InnoDB') {
                $rowsNumber = '&mdash;';
            } else {
                $rowsNumber = $this->getTableRowsNumber($table);
            }

            $tables[] = array(
                'name'   => $table,
                'engine' => $this->getTableEngine($table),
                'amount' => $rowsNumber
            );
        }

        return $tables;
    }


    public function getVersion() {

        global $wpdb;
        return $wpdb->get_var('SELECT VERSION()', 0, 0);
    }


    public function getVariables() {

        global $wpdb;

        $variables = array();
        foreach ($wpdb->get_results('SHOW SESSION VARIABLES') as $row) {
            $variables[$row->Variable_name] = $row->Value;
        }

        return $variables;
    }
}