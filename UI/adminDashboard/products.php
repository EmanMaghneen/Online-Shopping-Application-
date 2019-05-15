<?php 
session_start();
include 'includes/connection.php';
include 'includes/functions.php';
$query="SELECT * FROM section";
$result= mysqli_query($conn, $query);
$query="SELECT category.category_name,category.id,section.section_name FROM category INNER JOIN section ON category.section_id = section.id";
$result1=mysqli_query($conn, $query);
$query="SELECT * FROM manufacture";
$result2=mysqli_query($conn, $query);
$query="SELECT * FROM currency";
$result3=mysqli_query($conn, $query);
$query="SELECT product_option.name,product_option.id,category.category_name FROM product_option 
    INNER JOIN category ON product_option.category_id = category.id
";
$result4=mysqli_query($conn, $query);
$query="SELECT product.id,product.name,product.price,product.quantity,upload_img.path,category.category_name,manufacture.M_name FROM upload_img "
        . "INNER JOIN product ON upload_img.product_id =product.id "
        . "INNER JOIN category ON product.category_id=category.id "
        . "INNER JOIN manufacture ON product.manufacture_id=manufacture.id";
$result5=mysqli_query($conn, $query);
include 'includes/header.php';

?>
<div class="container">
   <ul class="nav nav-pills" role="tablist">
        
        <li class="active"><a href="#sec" role="tab" data-toggle="tab">SECTIONS</a></li>
             <li ><a href="#cat" role="tab" data-toggle="tab">CATEGORIES</a></li>
             <li ><a href="#man" role="tab" data-toggle="tab">MANUFACTURE</a></li>
             <li ><a href="#cur" role="tab" data-toggle="tab">CURRENCY</a></li>
             <li ><a href="#pro-op" role="tab" data-toggle="tab">PRODUCT-OPTIONS</a></li>
             <li ><a href="#pro" role="tab" data-toggle="tab">PRODUCTS</a></li>
        </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="sec">
           <table class="table table-striped table-bordered">
    <tr>
        <th>Section Name</th>
        <th>Action</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)>0){
        while ($row= mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['section_name']."</td>";
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no sections!</div>";
        }
        
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_sec_cat.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> section</a></div></td>
    </tr>
   </table> 
        </div>
        <div role="tabpanel" class="tab-pane active" id="cat">
           <table class="table table-striped table-bordered">
    <tr>
        <th>Category Name</th>
         <th>section</th>
        <th>Action</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result1)>0){
        while ($row= mysqli_fetch_assoc($result1)){
            echo "<tr>";
            echo "<td>".$row['category_name']."</td><td>".$row['section_name']."</td>";
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no caregory!</div>";
        }
       
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_sec_cat.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add category</a></div></td>
    </tr>
   </table> 
        </div>
        <div role="tabpanel" class="tab-pane active" id="man">
             <table class="table table-striped table-bordered">
    <tr>
        <th>Manufacture Name</th>
        <th>Action</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result2)>0){
        while ($row= mysqli_fetch_assoc($result2)){
            echo "<tr>";
            echo "<td>".$row['M_name']."</td>";
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no manufacture!</div>";
        }
        
        
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_sec_cat.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add manufacture</a></div></td>
    </tr>
    
   </table> 
        </div>
        <div role="tabpanel" class="tab-pane active" id="cur">
           <table class="table table-striped table-bordered">
    <tr>
        <th>CUrrency Name</th>
        <th>CUrrency converison</th>
        <th>Action</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result3)>0){
        while ($row= mysqli_fetch_assoc($result3)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['conversion']."</td>";
           echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no currency!</div>";
        }
        
        mysqli_close($conn);
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_sec_cat.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add converison</a></div></td>
    </tr>
    
   </table> 
        </div>
        <div role="tabpanel" class="tab-pane active" id="pro-op">
            <table class="table table-striped table-bordered">
    <tr>
        <th>option Name</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result4)>0){
        while ($row= mysqli_fetch_assoc($result4)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td>".$row['category_name']."</td>";
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no options!</div>";
        }
        
      
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_option.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add option</a></div></td>
    </tr>
    
   </table> 
        </div>
        <div role="tabpanel" class="tab-pane active" id="pro">
         <table class="table table-striped table-bordered">
    <tr>
        <th>product Name</th>
        <th>Image</th>
        <th>Manufacture</th>
        <th>price</th>
        <th>quantity</th>
        <th>Category</th>
        <th>view</th>
        <th>edit</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result4)>0){
        while ($row= mysqli_fetch_assoc($result5)){
            echo "<tr>";
            echo "<td>".$row['name']."</td><td><img src='{$row['path']}' width='100px' height='100px'></td><td>".$row['M_name']."</td><td>".$row['price']."</td><td>".$row['quantity']."</td><td>".$row['category_name']."</td>";
            echo "<td><a href='../OnlineShoppingproject/product.php?id={$row['id']}' type='button' class='btn btn-primary btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">view</span>'
                    . '</a></td>';
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-success btn-sm'>"
            .'<span class="glyphicon glyphicon-edit">edit</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no options!</div>";
        }
        
      
    ?>
    <tr>
        <td colspan="7"><div class="text-center"><a href="add_option.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span>Add product</a></div></td>
    </tr>
    
   </table>   
        </div>
    </div>

</div>
<?php 
include 'includes/footer.php';

?>