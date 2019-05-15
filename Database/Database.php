<?php


class Database {
    private $host="localhost";
    private $username="root";
    private $password="";
    private static $instance;// single database object i will explain it next section 
    private $db_name="online_shopping_sw1_v1";//your database name 
    private  $database_connection; // 
    public function __construct() {
      $this->database_connection = mysqli_connect($this->host, $this->username, $this->password, $this->db_name);
      /*$this->database_select($this->db_name);*/
      
    }
    public static function getInstance(){// create only one object for databse 
        if(!self::$instance){
            self::$instance= new  self();
        }
        return self::$instance;
    }
    
    /*private function database_connect($database_host, $database_username, $database_password) {
        if ($c = mysqli_connect($database_host, $database_username, $database_password)) {
            return $c;
            
        } else {
            
              
                die("Database connection error");
            
        }
    }
    
    private function database_select($database_name) {
        return mysqli_select_db($database_name, $this->database_connection)
            or die("no db is selecteted");
    }*/
    public function delete($table_name , $where_col_name =  NULL , $where_value )
    {
        if($wher_col_name != NULL)
        {
            return $this->database_query("delete from ".$table_name. " where ".$where_col_name."in(". $where_value.")");
        }
        return $this->database_query("Delete from ".$table_name);
    }

        public function database_close() {
        if(!mysqli_close($this->database_connection))die ("Connection close failed.");
           
    }
    public function clean($str) {
		$str = trim($str); // remove 
                /*Magic Quotes, generally speaking, is the process of escaping special characters with a '\' to allow a string to be entered into a database. This is considered 'magic' because PHP can do this automatically for you if you have magic_quotes_gpc turned on.
                  More specifically if magic_quotes_gpc is turned on for the copy of PHP you are using all Get, Post & Cookie variables (gpc, get it?) in PHP will already have special characters like ", ' and \ escaped so it is safe to put them directly into an SQL query.*/
		
                if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysqli_real_escape_string($str); //Clean any SQL words.
	}
    
 public function database_query($database_query) {
        
        $query_result = mysqli_query($this->database_connection,$database_query);
        return $query_result;
    }
    
    public function get_row($query) {
        if (!strstr(strtoupper($query), "LIMIT"))
            $query .= " LIMIT 0,1";
        if (!($res =$this->database_query($query))) {
         die( "Database error: " . mysqli_error() . "<br/>In query: " . $query);
        }
        return mysqli_fetch_assoc($res);
    }
       
    public function database_all_array($database_result) {
        $array_return=array();
        while ($row = mysqli_fetch_array($database_result)) {
            $array_return[] = $row;
        }
//        if(count($array_return)>0)
        return $array_return;


    }
    
   public function database_all_assoc($database_result) {

        while ($row = mysqli_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }
        return $array_return;
    }
    
      public   function database_affected_rows($database_result) {//no. of row

        return mysqli_affected_rows($database_result);
    }
    
    
     public   function database_num_rows($database_result) {

        return mysqli_num_rows($database_result);
    }
    
public function update($table, $data, $where='1'){
    $q="UPDATE `$table` SET ";

    foreach($data as $key=>$val){
        if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
        elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
        else $q.= "`$key`='".$this->escape($val)."', ";
    }

    $q = rtrim($q, ', ') . ' WHERE '.$where.';';

    return $this->query($q);
}#-#update()


    public function select_all($table_name , $where_col_name = NULL , $where_value )
    {
        if($wher_col_name != NULL)
        {
            $reselt = $this->database_query("select * from ".$table_name. " where ".$where_col_name."in(". $where_value.")");
        }
        else {
            $reselt = $this->database_query("select * from ".$table_name);
        }
        return mysqli_fetch_assoc($reselt);
    }
    public function select($table_name ,$slect_col_name, $where_col_name =  NULL , $where_value )
    {
        if($wher_col_name != NULL)
        {
            $reselt = $this->database_query("select ".$slect_col_name." from ".$table_name. " where ".$where_col_name."in(". $where_value.")");
        }
        else {
            $reselt = $this->database_query("select ".$slect_col_name." from ".$table_name);
        }
        return mysqli_fetch_assoc($reselt);
        
    }

    public function insert($table, $data){
    $q="INSERT INTO `$table` ";
    $v=''; $n='';

    foreach($data as $key=>$val){
        $n.="`$key`, ";
        if(strtolower($val)=='null') $v.="NULL, ";
        elseif(strtolower($val)=='now()') $v.="NOW(), ";
        else $v.= "'".$val."', ";
    }

    $q .= "(".rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";

    if($this->database_query($q)){
        
        return TRUE;
    }
    else return false;

}
}
?>
