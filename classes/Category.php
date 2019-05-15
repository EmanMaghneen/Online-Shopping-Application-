<?php

include_once '../Database/Database.php';
class Category {
    private $id;
    private $category_name;
    private $section_id;
    private $table_name;
    private $DB;
    public function __construct() {
        $this->DB = new Database();
        $this->table_name = "category";
    }
    public function add_category($category_name, $section_id)
    {
        $data = array();
        $data['section_id'] = $section_id;
        $data['category_name'] = $category_name;
        return $this->DB->insert($this->table_name , $data);
    }
}
