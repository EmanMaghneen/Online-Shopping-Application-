<?php
/*include_once ('C:/xampp/htdocs/project/db/users_all_queries.php');*/
include_once 'C:/xampp/htdocs/sw1_onlineshopping/Database/User_db.php';
include_once 'C:/xampp/htdocs/sw1_onlineshopping/classes/Product.php';
class User {
    private $id;
    private $username;
    private $telephone_number;
    private $address;
    private $email;
    private $FullName;
    private $password;
    private $user_type_id;
    private $user_db;
    private $dbName ;
    private $table_name ;
    public function __construct() {
        $this->user_db = new User_db();
        $this->dbName = "sw";
        $this->table_name = "users";
    }
    public function get_user_id()
    {
        $result = $this->DB->get_user_by_username_password($_SESSION['username'], $_SESSION['password']);
        return $result['id'];
    }

    public function login($username,$password){
        if($username && $password){
        $user_data=$this->User_Queries->get_user_by_username_password($username,$password);
            if($user_data){
            $this->id        = $user_data['id'];
            $this->FullName  = $user_data['FullName'];
            $this->email     = $user_data['email'];
            $this->password  = $user_data['password'];
            $this->username  = $user_data['username'];
            $this->user_type_id = new User_type($user_data['user_type_id']);
            $this->telephone_number = $user_data['telephone_number'];
            session_start();
            $_SESSION['id']=$user_data['id'];
            $_SESSION['username']=$user_data['username'];;
            $_SESSION['user_type_id']=$user_data['user_type_id'];
            return TRUE;
        }
        else{
            return FALSE;
        }
                }
            }
            
    public function logout()
    {
        session_start();
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['user_type_id']);
    }
    public function edite_profile()
    {
        
    }
    public function view_products()
    {
        return $this->user_db->view_product();
    }
    public function sort()
    {

    }
    public function search($product_name)
    {
        $product = new product();
        return $product->search($product_name);
    }
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getTelephone_number() {
        return $this->telephone_number;
    }

    function getAddress() {
        return $this->address;
    }

    function getEmail() {
        return $this->email;
    }

    function getFullName() {
        return $this->FullName;
    }

    function getPassword() {
        return $this->password;
    }

    function getUser_type_id() {
        return $this->user_type_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setTelephone_number($telephone_number) {
        $this->telephone_number = $telephone_number;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setFullName($FullName) {
        $this->FullName = $FullName;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setUser_type_id($user_type_id) {
        $this->user_type_id = $user_type_id;
    }


}
?>