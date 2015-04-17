<?php


class SqlMe_Grid_Row {


    public $id;
    public $cell;


    public function __construct($id, $data) {

        $this->id = $id;
        $this->cell = $data;
    }
}