<?php

      include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/Database.php';
      include_once 'C:/xampp/htdocs/sw1_onlineshopping/classes/Product.php';
class User_db {
    private $DB;
    function __construct() {
       $this->DB=new DataBase();
    }
    public function get_user_by_username_password($username,$password){
        $Query="SELECT * FROM `users` where username='$username' and password='$password'";
        $user_data=$this->DB->get_row($Query);
        return $user_data;
    }
     public function get_user_by_id($id){
        $id=$this->DB->clean($id);
        $Query="SELECT * FROM `users` where id='$id'";
        $user_data=$this->DB->get_row($Query);
        return $user_data;
    }
    public function add_new_user($user){
        $data=array();
        $data['fname']=$user->get_fname();
        $data['lname']=$user->get_lname();
        $data['email']=$user->get_email();
        $data['username']=$user->get_username();
        $data['password']=$user->get_password();
        $data['user_type_id']=$user->get_user_type()->id;
        $result= $this->DB->insert('users', $data);
        if($result){
            return TRUE;
        }
       else {
            return FALSE;
       }
    }
    public function get_user_type_by_id($id){
        $Query="SELECT * FROM `user_type`  where id=$id";
        $type_data=$this->DB->get_row($Query);
        return $type_data;
        
    }
    
    public function get_product($product_name)
    {
        return $this->DB->select_all($this->table_name, "name",$product_name) ;
    }
    
}
?>