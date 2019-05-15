<?php

include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/Product_db.php';
include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/Database.php';
class product {
    private $id;
    private $name;
    private $category_id;
    private $manufacture_id;
    private $price;
    private $quantity;
    private $currency_id;
    private $Pro_db;
    private $DB;
    public function __construct() {
        $this-> Pro_db = new Product_db();
        $this->DB = new Database();
    }

    public function add_product($id, $name, $category_id, $manufacture_id, $price, $quantity, $currency_id ,$id_photo, $path_photo)
    {
        return $this->Pro_db->add_new_product($id, $name, $category_id, $manufacture_id, $price, $quantity, $currency_id,$id_photo, $path_photo);
    }
    public function delete_product($product_id)
    {
        return $this->Pro_db->delete_product($product_id);
    }
    public function view_product()
    {
        return $this->Pro_db->view_product();
    }
    public function search($product_name)
    {
        return $this->Pro_db->get_product($product_name);
    }
    public function add_option($id,$name,$category_id)
    {
        $data = array();
        $data['name'] = $name;
        $data['category_id'] = $category_id;
        return $this->DB->database_query($this->DB->insert("product_option", $data));
    }
    public function edite_product($id, $name, $category_id, $manufacture_id, $price, $quantity, $currency_id )
    {
        $x = new Database();
        $data = array();
        $data['name']           = $name;
        $data['category_id']    = $category_id;
        $data['manufacture_id'] = $manufacture_id;
        $data['price']          = $price;
        $data['quantity']       = $quantity;
        $data['currency_id']     = $currency_id;
        if($x->update("users", $data, "id=".$id))
            return TRUE;
        return FALSE;
    }
    
    

    }
