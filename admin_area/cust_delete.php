<?php 
include("../includes/connect_db.php"); 

$delete=$_GET['cust_delete'];
$delete_query="delete from customer where cus_id='$delete'";
$run1=mysql_query($delete_query);
if($run1)
{
echo "<script>window.open('customer.php?cust_deleted=<h2>Your content has been Deleted........!</h2>','_self')</script>";


}

?>
