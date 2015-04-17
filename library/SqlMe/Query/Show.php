<?php


class SqlMe_Query_Show extends SqlMe_Query {


    public function getQueries() {

        return array(array(
            $this->_type => array(null)
        ));
    }
}