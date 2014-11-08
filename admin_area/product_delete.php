<?php
session_start();

if(!$_SESSION['username'])
{

header("location:admin_login.php");

}


?>

<?php 
include("../includes/connect_db.php"); 

$product_delete=$_GET['pro_delete'];
 $delete_query="delete from  products where product_id='$product_delete'";
$run1=mysql_query($delete_query);
if($run1)
{
echo "<script>window.open('view_product.php?product_deleted=<h2>Your product has been Deleted........!</h2>','_self')</script>";

}

?>
