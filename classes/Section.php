<?php

include_once '../Database/Database.php';
class Section {
    private $id;
    private $section_name;
    private $table_name;
    private $DB;
    public function __construct() {
        $this->table_name = "section";
        $this->DB = new Database();
    }
    public function add_secion($section_name)
    {
        $data = array();
        $data['section_name'] = $section_name;
        return $this->DB->database_query($this->DB->insert($this->table_name, $data));
    }
    public function view_section()
    {
        $this->DB->database_query($this->DB->select_all($this->table_name));
    }

}
