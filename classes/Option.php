<?php


class Option {
    private $product_id;
    private $product_option_id;
    private $id;
    private $table_name;
    private $DB;
    public function __construct() {
        $this->DB = new Database();
    }
    public function view_options($category_id)
    {
        return $this->DB->database_query($this->DB->select_all("product_option", "category_id",$category_id));
    }
    public function select_product_option ($product_id,$product_option_id,$value)
    {
        $data = array();
        $data['product_id'] = $product_id;
        $data['product_option_id'] = $product_option_id;
        $data2 = array();
        $data2['$product_selected_option_id'] = $data['product_option_id'];
        $data2['value'] = $value ;
        return $this->DB->database_query($this->DB->insert("product_selected_option", $data)) && $this->DB->database_query($this->DB->insert("product_selected_option_value", $data2));
    }
    public function edite_option($id,$name,$category_id)
    {
        $x = new Database();
        $data = array();
        $data['name'] = $name;
        if($x->update("product_option", $data, "id=".$id))
            return TRUE;
        return FALSE;
    }
}
