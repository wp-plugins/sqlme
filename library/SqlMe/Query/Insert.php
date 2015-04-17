<?php


class SqlMe_Query_Insert extends SqlMe_Query {


    public function getQueries() {

        $tables = array();

        foreach ($this->_data[$this->_type] as $statement) {
            if ($statement['expr_type'] == 'table') {
                $tables[] = array(
                    $this->_type => array($statement['table'])
                );
            }
        }

        return $tables;
    }
}