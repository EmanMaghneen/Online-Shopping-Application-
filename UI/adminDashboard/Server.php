<?php
include('includes/functions.php');
session_start();
$unameError=$fnameError=$emailError=$passwordError=$telnoError="";
/*
include('includes/connection.php');

$username=$fullname=$email=$password="";

*/
include '../../classes/Customer.php';
$employee= new Customer;
if(isset($_POST['reg_user']))
{

$employee->setId(Null);
$employee->setUser_type_id(4);
    if(!$_POST["username"])
    {
        $unameError = "Please enter username";
    }
    else
    {
        $employee->setUsername(validateFormData( $_POST["username"]));
    }

    if(!$_POST["fullname"])
    {
        $fnameError = "Please enter your fullname";
    }
    else
    {
        $employee->setFullName(validateFormData( $_POST["fullname"]));
    }

    if(!$_POST["email"])
    {
        $emailError = "Please enter your email";
    }
    else
    {
        $employee->setEmail(validateFormData( $_POST["email"]));
    }

    if(!$_POST["password"])
    {
        $passwordError = "Please enter your password";
    }
    else
    {
        $employee->setPassword(validateFormData( $_POST["password"]));
    }

    if(!$_POST["telno"])
    {
        $telnoError = "Please enter your Telephone Number";
    }
    else
    {
        $employee->setTelephone_number(validateFormData( $_POST["telno"]));
    }

    if( $employee->getUsername() && $employee->getFullName() && $employee->getEmail() && $employee->getPassword() &&$employee->getTelephone_number())
    {
       /* $query="INSERT INTO users (id, FullName, UserName, password, telephone_number, email, user_type_id) VALUES (NULL, '$fullname', '$username', '$password', '$telno', '$email', '4')";
        $result= mysqli_query($conn,$query);
        if($result)
        {
            header("Location: employees.php?alert=success");
        }
        else
        {
            echo "Error: ". $query ."<br>" .mysqli_error($conn);
        }*/
      $check=  $employee->register($employee->getId(),$employee->getUsername(),$employee->getPassword(),$employee->getTelephone_number(),$employee->getEmail(),$employee->getFullName(),$employee->getUser_type_id());
      if($check){
           header("Location: employees.php?alert=success");
      }else {
          echo 'there is an error';
      }
    }


}

    




