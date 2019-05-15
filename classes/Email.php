<?php


class Email {

    private $admin_email;
    private $email ;
    private $subject ;
    private $comment ;
    public function __construct() {
        $this->admin_email = "mosfetonlineshopping@gmail.com";
    }
    public function get_email(){
        return $this->email;
    }
    public function get_subject(){
        return $this->subject;
    }
    public function get_comment(){
        return $this->comment;
    }
    public function set_email($email){
         $this->email = $email;
    }
    public function set_subject($subject){
         $this->subject = $subject;
    }
    public function set_comment($comment){
         $this->comment = $comment;
    }
}
