<?php

include_once 'Database.php';
class Admin_db {
    private $DB;
    function __construct() {
        $this->DB=new DataBase_Class();
                
    }
    
    public function add_new_category($category_name,$categ_id,$section_id){
        $data=array();
        $data['category_name'] = $category_name;
        $data['categ_id']      = $categ_id;
        $data['section_id']    = $section_id;
        $result= $this->DB->insert('category', $data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
       }
    }
       public function add_new_section($id , $section_name){
        $data=array();
        $data['section_name'] = $category_name;
        $data['id']           = $categ_id;
        $result= $this->DB->insert('section', $data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
       }
       
}
}
