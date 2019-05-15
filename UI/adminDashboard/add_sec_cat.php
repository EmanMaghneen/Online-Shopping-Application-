<?php 
session_start();
$errorSec="";
$errorCat=NULL;
$alertMessage=NULL;
$errorMan=NULL;
$errorCur=NULL;
include 'includes/connection.php';
include 'includes/functions.php';
if(isset($_POST['add_section_btn'])){
    if(!$_POST['sectionName']){
        $errorSec="please enter section name";
    }else{
    $sectionName= validateFormData($_POST['sectionName']);
   
    $query="INSERT INTO section (id,section_name)"
            . "VALUES (NULL,'$sectionName')";
    $result= mysqli_query($conn, $query);
    if($result){
        $alertMessage ="<div class='alert alert-success'>New section added<a class='close' data-dismiss='alert'>&times;</a></div>";
    }
    else
    {
     echo 'ERROR in Add section:'.$query. mysqli_error($conn);
    }
}
 }
 if(isset($_POST['add_category_btn'])){
     if(!$_POST['add_category']){
         $errorCat="please add category";
     } else{
         $categoryName = validateFormData($_POST['add_category']);
         $sectionID = validateFormData($_POST['select_cat']);
       $query="INSERT INTO category (id,category_name,section_id)"
               . "VALUES (NULL,'$categoryName',$sectionID)";
       $result= mysqli_query($conn,$query);
       if($result){
         $alertMessage ="<div class='alert alert-success'>New category added<a class='close' data-dismiss='alert'>&times;</a></div>";
       } else {
        echo 'ERROR in Add category:'.$query. mysqli_error($conn);    
       }
     }
 }
 if(isset($_POST['add_manunfacture_btn'])){
     if(!$_POST['add_manufacture']){
         $errorMan="please add manfacture";
     } else {
         $ManunName= validateFormData($_POST['add_manufacture']);
         $query="INSERT INTO manufacture(id,M_name)"
                 . "VALUES (NULL,'$ManunName')";
         $result= mysqli_query($conn, $query);
         if($result){
         $alertMessage ="<div class='alert alert-success'>New Manufacture added<a class='close' data-dismiss='alert'>&times;</a></div>";    
         }else {
            echo 'ERROR in Add Manufacture:'.$query. mysqli_error($conn);      
         }
     }
 }
  if(isset($_POST['add_Currency_btn'])){
     if(!$_POST['add_CurrencyName'] && !$_POST['add_CurrencyConv']){
         $errorCur="please add CurrencyName or Conversion";
     } else {
         $curnName= validateFormData($_POST['add_CurrencyName']);
         $curnCon= validateFormData($_POST['add_CurrencyConv']);
         $query="INSERT INTO currency(id,name,conversion)"
                 . "VALUES (NULL,'$curnName','$curnCon')";
         $result= mysqli_query($conn, $query);
         if($result){
         $alertMessage ="<div class='alert alert-success'>New Currency convertion added<a class='close' data-dismiss='alert'>&times;</a></div>";    
         }else {
            echo 'ERROR in Add Currency:'.$query. mysqli_error($conn);      
         }
     }
 }
include 'includes/header.php';
?>
<?php 
echo $alertMessage;
?>

<div id="page-wrapper">


            <div class="row">
                <div class="col-md-6">
<div class="container">
           <form class="form-inline" action="<?php echo htmlspecialchars( $_SERVER["PHP_SELF"] ); ?>" method="post">
           
                   
             <h1 class="lead">Add Section</h1>
               <p class="text-danger"><?php echo $errorSec;?></p>       
             <div class="input-group">     
              <input  type="text" class="form-control" placeholder="Enter section name" name="sectionName">
                  <span class="input-group-btn">
                      <button type="submit" class="btn btn-warning btn-md" name="add_section_btn">Add!</button>
                  </span>
            
                 </div>
             <h1 class="lead">Add category</h1>
                    <div class="form-group">
                          
                           
              <input  type="text" class="form-control" placeholder="Enter category name" name="add_category">
              <select class="custom-select form-control" name="select_cat">
                   <option selected>Choose section</option>
                  <?php 
              $query="SELECT * FROM section";
         $result= mysqli_query($conn, $query);
         if(mysqli_num_rows($result)>0){
             while ($row= mysqli_fetch_assoc($result)){
                 echo "<option value='{$row['id']}' name='{$row['id']}'>{$row['section_name']}</option>"; 
             }
         }
              ?>
                  
      </select>
              <button type="submit" class="btn btn-warning btn-md" name="add_category_btn">Add!</button>
                  <p class="text-danger"><?php echo $errorCat;?></p>
                 </div>
               <h1 class="lead">Add Manufacture</h1>
             <div class="form-group">
                                   <p class="text-danger"><?php echo $errorMan;?></p>

                  <input  type="text" class="form-control" placeholder="Enter Manufacture name" name="add_manufacture">
                  <button type="submit" class="btn btn-warning btn-md" name="add_manunfacture_btn">Add!</button>
             </div>
                <h1 class="lead">Add currency convection</h1>
             <div class="form-group">
                                                    <p class="text-danger"><?php echo $errorCur;?></p>

                  <input  type="text" class="form-control" placeholder="Enter Currency name" name="add_CurrencyName">
                  <input  type="number" step="any" class="form-control" placeholder="Enter Currency convertion" name="add_CurrencyConv">
                  <button type="submit" class="btn btn-warning btn-md" name="add_Currency_btn">Add!</button>
             </div>
        </form>
    
    </div> 
</div>
                </div>
            </div>





<?php include 'includes/footer.php';?>