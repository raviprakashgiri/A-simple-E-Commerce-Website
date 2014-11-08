<!--- code for deletion ---->


<?php 
include("../includes/connect_db.php"); 

  $delete_content=$_GET['delete_cats'];
$delete="delete from categories  WHERE cat_id='$delete_content'";
if(mysql_query($delete))
{

echo "<script>window.open('view_categories.php?record_deleted=<h2>Your content has been Deleted........!</h2>','_self')</script>";

}



?>