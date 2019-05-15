<?php
session_start();
include 'includes/connection.php';
include 'includes/functions.php';
$categoryID=$_GET['categoryid'];
$productID=$_GET['productid'];

$t=3;
if($_GET['categoryid']){
    $query="SELECT * FROM product_option WHERE category_id=('{$_GET['categoryid']}')";
    $result0= mysqli_query($conn,$query);
}
if(isset($_POST['add_option_btn'])){
    if($result0){
     if(mysqli_num_rows($result0)>0){
     while ($row= mysqli_fetch_assoc($result0)){
         $optionName=$_POST[$row['name']];
        
         $query="INSERT INTO product_selected_option (product_id,product_option_id,id)"
                 . "VALUES ('$productID','{$row['id']}',NULL)";
         $result= mysqli_query($conn,$query);
                  $selOptionID= mysqli_insert_id($conn);

         if($result){
             $query="INSERT INTO product_selected_option_value (id,product_selected_option_id,value)"
                     . "VALUES (NULL,'$selOptionID','$optionName')";
             $result1= mysqli_query($conn,$query);
             if($result1){
                 $t=1;
             }else {
               echo "ERROR product_selected_option_value:".$query. mysqli_error($conn);  
             }
         } else {
             echo "ERROR product_selected_option:".$query. mysqli_error($conn);
         }
     }
     if($t==1){
         header("Location: add_sec_cat.php?alert=optionaddsccess");
         
     }
         } else {
         echo "no options is there";
     } 
    }else{
        echo "error".$query. mysqli_error($conn);
    } 
}
include 'includes/header.php';
?>
<div class="container">
    <h1 class="lead">Add options to product</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>?categoryid=<?php echo $categoryID;?>&productid=<?php echo $productID?>" method="post" enctype="multipart/form-data" class="row">

        <?php
        if(mysqli_num_rows($result0)>0){
            while ($row= mysqli_fetch_assoc($result0)){
                echo "<div class='form-group col-sm-8 col-sm-offset-2'>";
                echo "<label for='option-{$row['name']}'>{$row['name']}*</label>";
                echo "<input type='text' class='form-control input-sm' id='option-{$row['name']}' name='{$row{'name'}}' value='' placeholder='enter {$row['name']}' required>";
                echo "</div>";
                echo "<br>";
                
            
        }
        $optionID= mysqli_insert_id($conn);
        } else{
        echo 'No option in database';
        }
        ?>
            
           <div class="col-sm-8 col-sm-offset-2">
            <button type="submit" class="btn btn-sm btn-warning" name="add_option_btn">Add option</button>
    </div>   
        </form>
</div>

<?php 
        mysqli_close($conn);
include 'includes/footer.php';
?>