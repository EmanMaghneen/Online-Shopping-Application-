<?php 
session_start();
$errorOption= $alertMessage="";
include 'includes/connection.php';
include 'includes/functions.php';
if(isset($_POST['add_category_btn'])){
    if(!$_POST['add_option']){
        $errorOption="please enter option name";
    } else {
        $optionName= validateFormData($_POST['add_option']);
                $selectCategory= validateFormData($_POST['select_category']);
    }
    if($_POST['add_option']&&$_POST['select_category']){
        $query="INSERT INTO product_option (id,name,category_id) "
                . "VALUES (NULL,'$optionName','$selectCategory')";
        $result= mysqli_query($conn, $query);
        if($result){
                    $alertMessage ="<div class='alert alert-success'>New option is added<a class='close' data-dismiss='alert'>&times;</a></div>";

        }else {
            echo "ERROR Add option:".$query. mysqli_error($conn);
        }
        
    }
}
include 'includes/header.php';
?>
<div id="page-wrapper">

            <div class="row">
                <div class="col-md-6">
<div class="container">
    <?php 
    echo $alertMessage;
    ?>
           <form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
           
                   
             <h1 class="lead">Add Option</h1>
                    <div class="form-group">
                          
                        <p class="text-danger"><?php echo $errorOption;?></p>
              <input  type="text" class="form-control" placeholder="Enter option name" name="add_option">
              <select class="custom-select form-control" name="select_category">
        <option selected>Choose category to add in</option>
           <?php 
              $query="SELECT * FROM category";
         $result= mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
             while ($row= mysqli_fetch_assoc($result)){
                 echo "<option value='{$row['id']}' name='{$row['id']}'>{$row['category_name']}</option>"; 
             }
         }
              ?>
      </select>
              <button type="submit" class="btn btn-warning btn-md" name="add_category_btn">Add!</button>
                  
                 </div>
           </form>
</div>
                </div>
            </div>
</div>

<?php include 'includes/footer.php';?>