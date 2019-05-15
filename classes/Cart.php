<?php

include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/Cart_db.php';
class Cart {
    static $n = 1;
    private $product_id;
    private $id;
    private $user_id;
    private $cart_db;
    private $tabel_name;
    private $database_host;
    private $database_username;
    private $database_password;
    private $user_obj;
    private $result;
    public function __construct()
    {
        $this->cart_db = new Cart_db();
        $this->tabel_name = "cart";
        $this->database_host = "localhost";
        $this->database_username = "root";
        $this->database_password = "";
        $this->result   = $this->user_obj->get_user_id($_SESSION['username'], $_SESSION['password']);
        $this->user_id  = $result['id'];

    }

    public function add_to_cart($prod_id)
{
    session_start();
    if ($_SESSION['username'] && $_SESSION['password'])
    {
        $this->user_obj = new User();
        $this->cart_db->add_to_cart($prod_id, $this->user_id);
    }
 else {
     
    setcookie("prodect".$prod_id,$prod_id, time()+(60*60*24*30*2),"/");
 }
}
public function delet_from_cart($prod_id)
{
    $x = new Database();
    session_start();
    if ($_SESSION['username'])
    {
        return $this->cart_db->delet_from_cart($prod_id, $this->user_id);   
    }
 else {
    setcookie("prodect".$prod_id,$prod_id, time()-(60*60*24*30*2),"/");
 }
    
}
public function view_cart()
{
    session_start();
    if ($_SESSION['username'])
    {
        
        return $this->cart_db->view_cart($this->user_id);
    }
    return $_COOKIE;
}

}
