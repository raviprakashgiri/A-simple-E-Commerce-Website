<!--- code for deletion ---->


<?php 
include("../includes/connect_db.php"); 

  $brand_content=$_GET['delete_brand'];
$delete="delete from brand  WHERE brand_id='$brand_content'";
if(mysql_query($delete))
{

echo "<script>window.open('view_brand.php?record_deleted=<h2>Your content has been Deleted........!</h2>','_self')</script>";

}



?>