<?php

include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/Database.php';
include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/User_db.php';
class Cart_db {
    private $product_id;
    private $id;
    private $user_id;
    private $DB;
    private $tabel_name;
    private $database_host;
    private $database_username;
    private $database_password;
    private static $n;
    private $user_obj ;
    public function __construct()
    {
        $this->DB = new Database();
        $this->tabel_name = "cart";
        $this->database_host = "localhost";
        $this->database_username = "root";
        $this->database_password = "";
        $this->n = 1;
        $this->user_obj = new User_db();
    }
    public function delet_from_cart($prod_id , $user_id)
    {
        return $this->DB->database_query( "delet from cart where product_id= ".$prod_id ."&& user_id = ". $user_id);
    }
    public function add_to_cart($prod_id , $user_id)
    {
        $data = array();
        $data['id']          = $this->n;
        $data['product_id']  = $prod_id;
        $data['user_id']     = $user_id;
        $price = $this->DB->select($this->table_name, "total_price","id" ,$prod_id);
        $data['total_price'] = $price;
        $sql = $this->DB->insert($this->tabel_name , $data);
        $this->n++;
    }
    public function view_cart($user_id)
    {
        return $this->DB->select_all($this->table_name,"user_id",$user_id);
    }
}
