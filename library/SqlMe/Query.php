<?php


abstract class SqlMe_Query {


    protected $_type;
    protected $_data;
    private static $_queryMap = array(
        'SELECT'    => 'SqlMe_Query_Select',
        'SET'       => 'SqlMe_Query_Set',
        'INSERT'    => 'SqlMe_Query_Insert',
        'REPLACE'   => 'SqlMe_Query_Replace',
        'DELETE'    => 'SqlMe_Query_Delete',
        'SHOW'      => 'SqlMe_Query_Show',
        'UNION'     => 'SqlMe_Query_Union',
        'UNION ALL' => 'SqlMe_Query_Union',
        'UPDATE'    => 'SqlMe_Query_Update'
    );


    public static function factory($data) {

        reset($data);
        $type = key($data);

        if (! array_key_exists($type, self::$_queryMap)) {
            throw new Exception('Unexpected sql query type');
        }

        $class = self::$_queryMap[$type];

        return new $class($type, $data);
    }


    public function __construct($type, $data) {

        $this->_type = $type;
        $this->_data = $data;
    }


    public function getStatistics() {

        reset($this->_data);
        $key = key($this->_data);

        if (! array_key_exists($key, self::$_queryMap)) {
            throw new Exception('Cannot get statistics for query ' . $key);
        }

        return $this->getQueries();
    }


    abstract public function getQueries();


    protected function _getQueryType($string) {

        if (($position = strpos($string, ' ')) !== false) {
            $type = substr($string, 0, $position);
        } else {
            $type = $string;
        }

        return $type;
    }


    public function getType() {

        return $this->_type;
    }
}