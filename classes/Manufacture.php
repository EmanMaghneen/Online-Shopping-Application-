<?php

include_once '../Database/Database.php';
class Manufacture {
    private $id;
    private $M_name;
    private $table_name;
    private $DB;
    public function __construct() {
        $this->table_name = "manufacture";
        $this->DB = new Database();
    }
    public function add_manufacture($M_name)
    {
        $data = array();
        $data['M_name'] = $M_name;
        $this->DB->database_query($this->DB->insert($this->table_name , $data));
    }
}
