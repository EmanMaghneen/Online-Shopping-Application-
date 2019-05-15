<?php 
if(!$_SESSION['loggedInUser']){
     header("Location: login.php");
 } else {
     
 $lipa='';
$user =$_SESSION['loggedInUser'];

 }
 if($_SESSION['loggedInUserID']==1){
     $lipa=' <li ><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                <li class="selected"><a href="add_sec_cat.php"><i class="fa fa-bullseye"></i>ADD Section &amp; Category</a></li>
                <li><a href="products.php"><i class="fa fa-bullseye"></i>products</a></li>
                <li><a href="add_product.php"><i class="fa fa-bullseye"></i>Add product</a></li>
                 <li><a href="add_option.php"><i class="fa fa-bullseye"></i>Add option</a></li>
                <li><a href="register.php"><i class="fa fa-bullseye"></i>Add Employee</a></li>
                                <li><a href="employees.php"><i class="fa fa-bullseye"></i>Employees</a></li>';
     
 }
 else {
     $lipa='<li class="selected"><a href="add_sec_cat.php"><i class="fa fa-bullseye"></i>ADD Section &amp; Category</a></li>
         <li><a href="products.php"><i class="fa fa-bullseye"></i>products</a></li>
                <li><a href="add_product.php"><i class="fa fa-bullseye"></i>Add product</a></li>
                 <li><a href="add_option.php"><i class="fa fa-bullseye"></i>Add option</a></li>';
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dark Admin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />


    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />

</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Admin Panel</a>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
        
        
            <ul id="active" class="nav navbar-nav side-nav">
               
               <!-- <li ><a href="index.php"><i class="fa fa-bullseye"></i> Dashboard</a></li>
                <li class="selected"><a href="add_sec_cat.php"><i class="fa fa-bullseye"></i>ADD Section &amp; Category</a></li>
                <li><a href="add_product.php"><i class="fa fa-bullseye"></i>Add product</a></li>
                 <li><a href="add_option.php"><i class="fa fa-bullseye"></i>Add option</a></li>
                <li><a href="register.php"><i class="fa fa-bullseye"></i>Add Employee</a></li>
                                <li><a href="employees.php"><i class="fa fa-bullseye"></i>Employees</a></li>
                   -->        
                   <?php 
                   echo $lipa;
                   ?>
 </ul>
           
            <ul class="nav navbar-nav navbar-right navbar-user">
                <li class="dropdown user-dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $user;?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>

                    </ul>
                </li>
                <li class="divider-vertical"></li>
                <li>
                    <form class="navbar-search">
                        <input type="text" placeholder="Search" class="form-control">
                    </form>
                </li>
            </ul>
        </div>
    </nav>
