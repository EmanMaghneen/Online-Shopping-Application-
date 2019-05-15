<?php

include 'User.php';
include_once 'Product.php';
include_once 'Category.php';
include_once 'Section.php';
class Admain extends User{
    private $product;
    private $category;
    private $section;
    public function __construct() {
        parent::__construct();
        $this->product = new product();
        $this->category = new Category();
        $this->section = new Section();
    }

    public function add_item($id, $name, $category_id, $manufacture_id, $price, $quantity, $currency_id){
        $this->product->add_product($id, $name, $category_id, $manufacture_id, $price, $quantity, $currency_id);
    }
    public function delete_item($product_id){
        $this->product->delete_product($product_id);
    }
    public function view_item(){
        $this->product->view_product();
    }
    public function add_category($category_name, $section_id){
        $this->category->add_category($category_name, $section_id);
    }
    public function add_section($section_name){
        $this->section->add_secion($section_name);
    }
    
   
     
    
}
