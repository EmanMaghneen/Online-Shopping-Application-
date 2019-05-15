<?php


class Currency {
    private $id;
    private $name;
    private $conversion;
    private $table_name;
    private $DB;
    public function __construct() {
        $this->table_name = "currency";
        $this->DB = new Database();
    }
    public function add_currency($name , $conversion)
    {
        $data = array();
        $data['name'] = $name;
        $data['conversion'] = $conversion;
        $this->DB->database_query($this->DB->insert($this->table_name , $data));
    }
    
}
