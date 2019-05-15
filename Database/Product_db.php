<?php

include_once 'Database.php';
class Product_db {
    private $DB;
    private $table_name;
    public function __construct() {
        $this->DB = new Database();
        $this->table_name = "product";
    }

    public function add_new_product($id ,$name ,$category_id , $manufacture_id , $price , $quantity , $currency_id,$id_photo, $path_photo){
        $data=array();
        $data['id']             = $id;
        $data['name']           = $name;
        $data['category_id']    = $category_id;
        $data['manufacture_id'] = $manufacture_id;
        $data['price']          = $price;
        $data['quantity']       = $quantity;
        $data['currency_id']    = $currency_id;
        $data2 = array();
        $data2['id'] = $id_photo;
        $data2['path'] =$path_photo;
        $data2['product_id'] = $id ;
        $result = $this->DB->insert($this->table_name, $data);
        $result2 = $this->DB->insert("upload_img", $data2);
        if($result && $result2){
            return TRUE;
        }
       else {
            return FALSE;
       }
    }
    public function delete_product($product_id)
    {
        return $this->DB->delete($this->table_name, "product_id",$product_id);
    }
    public function view_product()
    {
        return $this->DB->select_all($this->table_name) && $this->DB->select_all("upload_img");
        
    }
    public function get_product($product_name)
    {
        return $this->DB->select_all($this->table_name, "name",$product_name) ;
    }
    
}
