<?php


class SqlMe_Query_Select extends SqlMe_Query {


    public function getQueries() {

        $queries = array();

        if (! isset($this->_data[$this->_type])) {
            return $queries;
        }

        if (! isset($this->_data['FROM'])) {
            $queries[] = array($this->_type => array(null));
            return $queries;
        }

        foreach ($this->_data['FROM'] as $statement) {
            if ($statement['expr_type'] == 'subquery') {

                if (count($this->_data['FROM']) == 1 && isset($statement['alias']['name'])) {
                    $queries[][$this->_type] = array($statement['alias']['name']);
                }

                $queries = array_merge($queries, SqlMe_Query::factory($statement['sub_tree'])->getQueries());
            } elseif ($statement['expr_type'] == 'table') {

                if (count($queries) > 0) {
                    foreach ($queries as & $query) {
                        if (isset($query[$this->_type])) {
                            $query[$this->_type][] = $statement['table'];
                        }
                    }
                } else {
                    $queries[][$this->_type] = array($statement['table']);
                }
            } else {
                throw new Exception('Unexpected expression type');
            }
        }

        return $queries;
    }
}