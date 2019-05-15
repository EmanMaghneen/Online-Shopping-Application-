<?php 
include ('Server.php');
//include ('includes/header.php');

?>

<div class="container">
        <div class="row text-center">
            <h2>Add Employee</h2>
        </div>
        <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
        <div>
            <label for="username" class="col-md-2">
                User Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="username" placeholder="Enter User Name" name="username">
                <span class="error">* <?php echo $unameError;?></span>
            </div>
            <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>        
        <div>
            <label for="fullname" class="col-md-2">
                Full Name:
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" id="fullname" placeholder="Enter Full Name" name="fullname">
                <span class="error">* <?php echo $fnameError;?></span>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
        <div>
            <label for="emailaddress" class="col-md-2">
                Email address:
            </label>
            <div class="col-md-9">
                <input type="email" class="form-control" id="emailaddress" placeholder="Enter email address" name="email">
                <span class="error">* <?php echo  $emailError;?></span>
                <p class="help-block">
                    Example: yourname@domain.com
                </p>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
        <div>
            <label for="password" class="col-md-2">
                Password:
            </label>
            <div class="col-md-9">
                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                <span class="error">* <?php echo $passwordError;?></span>
                <p class="help-block">
                    Min: 6 characters (Alphanumeric only)
                </p>
            </div>
             <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>
        <div>
            <label for="Telephone" class="col-md-2">
                Telephone Number:
            </label>
            <div class="col-md-9">
                <input type="tel" class="form-control" id="Telephone"  name="telno">
                <span class="error">* <?php echo $telnoError;?></span>
            </div>
            <div class="col-md-1">
                <i class="fa fa-lock fa-2x"></i>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <button type="submit" class="btn btn-info" name="reg_user">
                    Register
                </button>
            </div>
        </div>
        </form>
        <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    </div>    
    </div>
<?php 
 include 'includes/footer.php';
?>