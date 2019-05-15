<?php 
session_start();
$adminID=$_SESSION['loggedInID'];
 $alertMessage="";
 $errorProName=$errorSelCat=$errorSelMan=$errorProPrice=$errorProQuan=$errorProCurr=$errorUploadFile="";
include 'includes/connection.php';
include 'includes/functions.php';
if(isset($_POST['add_product_btn'])){
    if(!$_POST['productName']){
        $errorProName="please enter product name";
    } else {
        $productName= validateFormData($_POST['productName']);
    }
    if(!$_POST['select_category']){
        $errorSelCat="please select category to add into";
    } else {
        $selectCategory= validateFormData($_POST['select_category']);
    }
    if(!$_POST['select_manufacture']){
        $errorSelMan="please select Manufacture to add into";
    } else {
        $selectManufacture= validateFormData($_POST['select_manufacture']);
    }
    if(!$_POST['product_price']){
        $errorProPrice="please Enter product price ";
    } else {
        $productPrice= validateFormData($_POST['product_price']);
    }
    if(!$_POST['product_quantity']){
        $errorProQuan="please Enter product Quantity ";
    } else {
        $productQuantity= validateFormData($_POST['product_quantity']);
    }
    if(!$_POST['product_currency']){
        $errorProCurr="please Enter product Currency ";
    } else {
        $productCurrency= validateFormData($_POST['product_currency']);
    }
    if(!$_FILES['uploadfile']['name']){
        $errorUploadFile="please Enter product img ";
    } else {
        $productUploadFile= validateFormData($_FILES['uploadfile']['name']);
    }
    
    if($_POST['select_category'] &&$_POST['productName'] &&$_POST['select_manufacture']&&$_POST['product_price']&&$_POST['product_quantity']&&$_POST['product_currency']&&$_FILES['uploadfile']['name']){
           $target_path="img/";
       $target_path=$target_path.basename($_FILES['uploadfile']['name']);
       if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$target_path)){
        $query="INSERT INTO product (id,name,category_id,manufacture_id,price,quantity,currency_id)"
                . "VALUES(NULL,'$productName','$selectCategory','$selectManufacture','$productPrice','$productQuantity','$productCurrency')";
        $result= mysqli_query($conn, $query);
        if($result){
            $productID= mysqli_insert_id($conn);
            $query="INSERT INTO upload_img (id,path,product_id)"
                    . "VALUES(NULL,'$target_path','$productID')";
            $result1= mysqli_query($conn, $query);
            if($result1){
                echo "good for you";
            } else {
               echo "ERROR Add prdouct-imf:".$query. mysqli_error($conn); 
            }
        }else {
            echo "ERROR Add prdouct:".$query. mysqli_error($conn);
        }
        
    }
      
} else {
         $alertMessage ="<div class='alert alert-warning'>Somthinf=g is went wrong<a class='close' data-dismiss='alert'>&times;</a></div>";    
    
}
if(isset($productID)){
 $adUserName=$_SESSION['loggedInUser'];
 $query="INSERT INTO upload_admin (id,name)"
         . "VALUES (NULL,'$adUserName')";
 $result= mysqli_query($conn, $query);
 if($result) {
     $uploadAdminID= mysqli_insert_id($conn);
     $query="INSERT INTO date_of_upload(id,date_of_upload)"
             . "VALUES (NULL,CURRENT_TIMESTAMP)";
     $result1= mysqli_query($conn, $query);
     if($result1){
         $uploadDateID= mysqli_insert_id($conn);
         $query="INSERT INTO upload (id,product_Id,upload_by_id,upload_date_id)"
                 . "VALUES (NULL,'$productID','$uploadAdminID','$uploadDateID')";
         $result2= mysqli_query($conn, $query);
         if($result2){
             header("Location: product_add_option.php?alert=productisadded&categoryid=$selectCategory&productid=$productID");
         }else {
            echo "ERROR Add upload Table:".$query. mysqli_error($conn);     
         }
     } else {
       echo "ERROR Add upload date:".$query. mysqli_error($conn);   
     }
 } else {
     echo "ERROR Add upload info:".$query. mysqli_error($conn); 
 }
}}
include 'includes/header.php';
?>
<div class="container">
    <h1 class="lead">Add product</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data" class="row">
    <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="product-name">Name *</label>
        <input type="text" class="form-control input-sm" id="product-name" name="productName" value="" placeholder="Add product name">
        <P class="text-danger"><?php 
            echo $errorProName;
        ?></P>
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="productCategory">Category*</label>
        <select id="productCategory" class="custom-select form-control" name="select_category">
        <option selected>Choose category</option>
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
         <P class="text-danger"><?php 
            echo $errorSelCat;
        ?></P>
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="productManufacture">Manufacture</label>
        <select id="productManufacture" class="custom-select form-control" name="select_manufacture">
        <option selected>Choose Manufacture</option>
        <?php 
              $query="SELECT * FROM manufacture";
         $result= mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
             while ($row= mysqli_fetch_assoc($result)){
                 echo "<option value='{$row['id']}' name='{$row['id']}'>{$row['name']}</option>"; 
             }
         }
              ?>
         </select>
         <P class="text-danger"><?php 
            echo $errorSelMan;
        ?></P>
    </div>
    <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="product-price">price</label>
        <input type="number" step="any" class="form-control input-sm" id="product-price" name="product_price" value="">
         <P class="text-danger"><?php 
            echo $errorProPrice;
        ?></P>
    </div>
     <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="product-quantity">Quantity</label>
        <input type="number" class="form-control input-sm" id="product-quantity" name="product_quantity" value="">
         <P class="text-danger"><?php 
            echo $errorProQuan;
        ?></P>
    </div>
     <div class="form-group col-sm-8 col-sm-offset-2">
        <label for="productCurrency">Currency</label>
        <select id="productCurrency" class="custom-select form-control" name="product_currency">
        <option selected>Choose Currency</option>
          <?php 
              $query="SELECT * FROM currency";
         $result= mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
             while ($row= mysqli_fetch_assoc($result)){
                 echo "<option value='{$row['id']}' name='{$row['id']}'>{$row['name']}</option>"; 
             }
         }
              ?>
         </select>
         <P class="text-danger"><?php 
            echo $errorProCurr;
        ?></P>
    </div>
   <div class="col-sm-8 col-sm-offset-2">
        <input type="hidden" value="1000000" name="MAX_FILE_SIZE"  class="form-control input-sm">
        <input type="file" name="uploadfile"  class="form-control input-sm">
         <P class="text-danger"><?php 
            echo $errorUploadFile;
        ?></P>
        </div>
    
    <div class="col-sm-8 col-sm-offset-2">
        <br>
        <a href="index.php" type="button" class="btn btn-sm btn-default">Cancel</a>
            <button type="submit" class="btn btn-sm btn-warning pull-right" name="add_product_btn" v>Add product</button>
    </div>
</form>
    <br><br>

   
</div>

<?php
include('includes/footer.php');
?>