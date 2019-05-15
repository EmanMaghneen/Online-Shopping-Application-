<?php 
session_start();
$alertMessage="";
include('includes/connection.php');
include 'includes/functions.php';
$query="SELECT * FROM users WHERE user_type_id=4 ";
$result= mysqli_query($conn, $query);
if(isset($_GET['id'])){
    $userID= validateFormData($_GET['id']);
   $alertMessage ="   
        <div class='alert alert-danger'>
            <p>Are you sure you want to delete this client? No takes back!</p>
            <br>
            <form action='".htmlspecialchars($_SERVER['PHP_SELF'])."?id=$userID' method='post'>
                <input type='submit' class='btn btn-danger btn-sm' name='confirm-delete' value='Yes, delete!'>
                <a type='button' class='btn btn-default btn-sm' data-dismiss='alert'>Oops,no thanks!
                </a>
            </form>
            </div>";
}
if(isset($_POST['confirm-delete'])){
   
   $query="DELETE FROM users WHERE id=('$userID')";
   $result= mysqli_query($conn, $query);
   if($result){
     header("Location:".htmlspecialchars($_SERVER['PHP_SELF'])."?alert=deleted");  
   }else {
       echo "Error updating record: ".$query. mysqli_error($conn);
   }
}
if(isset($_GET['alert'])){
    if($_GET['alert']=='success'){
        $alertMessage ="<div class='alert alert-warning'>New client added<a class='close' data-dismiss='alert'>&times;</a></div>";
    }elseif($_GET['alert']=='deleted'){
     $alertMessage="<div class='alert alert-warning'>New client deleted!<a class='close' data-dismiss='alert'>&times;</a></div>";   
}}
include('includes/header.php');
?>
<div class="container">
    <?php 
    echo $alertMessage;
    ?>
   <table class="table table-striped table-bordered">
    <tr>
        <th>Full name</th>
        <th>UserName</th>
        <th>Telephone number</th>
        <th>email</th>
    </tr>
    <?php 
    if(mysqli_num_rows($result)>0){
        while ($row= mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$row['FullName']."</td><td>".$row['UserName']."</td><td>".$row['telephone_number']."</td><td>".$row['email']."</td>";
            echo "<td><a href='".htmlspecialchars( $_SERVER['PHP_SELF'] )."?id={$row['id']}' type='button' class='btn btn-danger btn-sm'>"
            .'<span class="glyphicon glyphicon-edit`">Delete</span>'
                    . '</a></td>';
            echo "</tr>";
            
        }
            
        }else {
            echo "<div class='alert alert-warning'>you have no clients!</div>";
        }
        mysqli_close($conn);
    ?>
  
    <tr>
        <td colspan="7"><div class="text-center"><a href="register.php" type="button" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-plus"></span> Add Client</a></div></td>
    </tr>
</table>
</div>
<?php 
include 'includes/footer.php';
?>