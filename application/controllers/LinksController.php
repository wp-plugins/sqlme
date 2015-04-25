<?php


class LinksController extends Zend_Controller_Action {


    const ROWS_PER_PAGE = 20;


    public function indexAction() {

        $this->view->assign('rowsPerPage', self::ROWS_PER_PAGE);
    }


    public function statAction() {

        $uri = $this->_getParam('uri');

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();
        $stat = $Driver->selectRow(
            'SELECT COUNT(*) as count,
                 COALESCE(MIN(amount), 0) AS min,
                 COALESCE(ROUND(AVG(amount), 2), 0) AS mean,
                 COALESCE(MAX(amount), 0) AS max
             FROM sqlme_count_log 
             WHERE uri LIKE %s',
            array('%' . $uri . '%')
        );

        $this->view->assign('uri', $uri);
        $this->view->assign($stat);
    }


    public function truncateAction() {

        
    }


    public function listAction() {

        require_once 'SqlMe/Grid/Row.php';

        $this->getHelper('ViewRenderer')->setNoRender();
        $this->_response->setHeader('Content-type', 'application/json');

        $limit = isset($_REQUEST['rows']) && is_numeric($_REQUEST['rows']) ? $_REQUEST['rows'] : self::ROWS_PER_PAGE;
        $page  = isset($_REQUEST['page']) && is_numeric($_REQUEST['page']) ? $_REQUEST['page'] : 1;
        if ($page == 1) {
            $offset = 0;
        } else {
            $offset = ($page - 1) * $limit;
        }

        $orderBy = isset($_REQUEST['sidx']) && in_array(strtolower($_REQUEST['sidx']), array('host', 'uri', 'amount', 'date')) ? $_REQUEST['sidx'] : 'date';
        if (isset($_REQUEST['sord']) && in_array(strtoupper($_REQUEST['sord']), array('ASC', 'DESC'))) {
            $order = strtoupper($_REQUEST['sord']);
        } else {
            $order = 'ASC';
        }

        $data = array($offset, $limit);

        $where = '';
        if (isset($_REQUEST['uri']) && strlen($_REQUEST['uri']) > 0) {
            $where = 'WHERE `uri` LIKE %s';
            array_unshift($data, '%' . $_REQUEST['uri'] . '%');
        }

        require_once 'SqlMe/Driver.php';
        $Driver = SqlMe_Driver::factory();
        $links = $Driver->selectList(
            'SELECT * FROM sqlme_count_log ' . $where . ' ORDER BY `' . $orderBy . '` ' . $order . ' LIMIT %d, %d',
            $data,
            $Driver->getAsNumericArray()
        );

        $rows = array();
        $rowsNumber = count($links);
        for ($i = 0; $rowsNumber > $i; $i ++) {
            $rows[] = new SqlMe_Grid_Row($i, $links[$i]);
        }

        $rowsCount = $Driver->selectCell(
            'SELECT COUNT(*) FROM sqlme_count_log ' . $where,
            isset($_REQUEST['uri']) && strlen($_REQUEST['uri']) > 0 ? array('%' . $_REQUEST['uri'] . '%') : array()
        );

        $totalPages = ceil($rowsCount / $limit);

        $data = array(
            'page' => isset($_REQUEST['page']) && is_numeric($_REQUEST['page']) ? $_REQUEST['page'] : 1,
            'records' => $rowsNumber,
            'total' => $totalPages,
            'rows' => $rows
        );

        echo json_encode($data);
    }
}