<?php


class SqlMe_Query_Union extends SqlMe_Query {


    public function getQueries() {

        $union  = $this->_getQueryType($this->_type);
        $tables = array(
//             $union => array()
        );

        foreach ($this->_data[$this->_type] as $subquery) {
//             SqlMe_Query::factory($subquery)->getQueries();
            $tables = array_merge($tables, SqlMe_Query::factory($subquery)->getQueries());
        }

        foreach ($tables as $type => $table) {
//             var_dump($table);
        }
//         $tables[] = array(
//             $this->_getQueryType($this->_type) => array_values($tables)
//         );

        return $tables;
    }
}