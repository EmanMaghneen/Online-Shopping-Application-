<?php

include_once 'User.php';
include_once 'Cart.php';
class Customer extends User{
    private $DB ;
    public function __construct() {
        parent::__construct();
        $this->DB = new Database();
    }

    public function register($id, $username,$password/*,$password2*/,/*$address,*/$phone,$email,$fullname,$user_type_id)
{
   
    /*if($password == $password2)*/
    /*{*/
        $user_data = array();
        $this->id        = $user_data['id']        = $id ;
        $this->FullName  = $user_data['FullName']  = $fullname;
        $this->email     = $user_data['email']     = $email;
        $this->password  = $user_data['password']  = $password;
        $this->username  = $user_data['username']  = $username;
        $this->user_type_id = $user_data['user_type_id'] = $user_type_id;
        $this->telephone_number = $user_data['telephone_number'] = $phone;
        if($this->DB->insert('users', $user_data)){
        
     /*   session_start();*/
        $_SESSION['id']=$user_data['id'];
        $_SESSION['username']=$user_data['username'];;
        $_SESSION['user_type_id']=$user_data['user_type_id'];
        return TRUE;
        } else {
            echo 'error';
        }
    /*}*/
    
}


public function rate()
{
    
}
public function add_to_cart($prod_id)
{
    $x = new Cart();
    $x -> add_to_cart($prod_id);
}
public function delet_from_cart($prod_id)
{
    $x = new Cart();
    $x ->delet_from_cart($prod_id);
}
public function view_cart()
{
    $x = new Cart();
    $x ->view_cart();
}



}
