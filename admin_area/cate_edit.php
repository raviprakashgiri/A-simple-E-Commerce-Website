<?php
session_start();

if(!$_SESSION['username'])
{

header("location:admin_login.php");

}


?>

 <?php 
include("../includes/connect_db.php"); 
?>

 <?php 
include("../includes/connect_db.php"); 

 $edit_content=@$_GET['edit_cats'];
  $edit_categories="select  * from categories WHERE cat_id='$edit_content'";
 $run=mysql_query($edit_categories);

while($row=mysql_fetch_array($run))
{
  $cat_id=$row['cat_id'];
 $cat_name=$row['cat_name'];

 }
 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Only Allow Here </title>
<link rel="stylesheet" href="style/wraper.css">

<style type="text/css">

.admin_box{
width:870px;
height:600px;


}

.admin_image_box{
width:70px;
height:70px;
background-color:#333300;
float:right;


}

.admin_welcome_box{
width:800px;
height:30px;
background-color:#009966;
float:left;


}
</style>

</head>

<body>
<center><div class="wraper">


<div class="wraper_header">
<div class="wraper_header1">
<img src="image/header_admin1.jpg">

</div>

<div class="wraper_header3">
<img src="image/header_admin3.jpg">

</div>


</div>
<div class="wraper_navigation">

</div>
<div class="wraper_content">
<div class="wraper_left_content">
<div class="manage">
Control

</div>
<ul class="admin">
<li><a href="insert_product.php">Insert Product</a><li>
<li><a href="view_product.php">View Product</a><li>
<li><a href="insert_catego.php">insert Catego</a><li>
<li><a href="view_categories.php">View Categories </a><li>
<li><a href="insert_brand.php">Insert Brand</a><li>
<li><a href="view_brand.php">View Brand</a><li>
<li><a href="view_cart.php">View Cart</a><li>
<li><a href="customer.php">Customer</a><li>


</ul>
</div>
<div class="wraper_right_content">
<div class="admin_box">

<div class="admin_image_box">



</div>

<div class="admin_welcome_box">




<form action="cate_edit.php?update_cat=<?php echo   $cat_id; ?>" method="post" enctype="multipart/form-data" name="edit">

<table width="500" border="1"  align="center" style="margin-top:30px;" bordercolor="black"> 
 
 <tr> 
 <td colspan="2" color="black"><h3 align="center" style="color:#CCCCCC;">Update Categories</h3></td>
 </tr>
 <tr> 
  <td align="center">Categories Name</td>
  <td align="center">Categories Id</td>
 </tr>
 <tr>

<td align="center" style="color:#FFFF00; text-align:center;" ><input type="text" name="id" size="30" value="<?php  echo $cat_id; ?> "/> </td> 

 <td align="center" style="color:#FFFF00; text-align:center;" ><input type="text" name="name" size="30" value="<?php echo $cat_name; ?>" /> </td>

 </tr>
 
 <tr>
 <td align="center" colspan="2"><input type="submit" name="update" value="Update Now"></td>
 
 
 </tr>
</table>





</form>
</div>

</div>
</div>


</div>

<div class="wraper_footer">

</div>

</div></center>
</body>
</html>
<?php 
if(isset($_POST['update']))
{
 $update_cats=$_GET['update_cat'];
 $update_name=$_POST['name'];
  $update_id=$_POST['id'];

 $update_query="update categories set cat_id='$update_id', cat_name='$update_name' where cat_id='$update_cats'";

if(mysql_query($update_query))
{
echo "<script>window.open('view_categories.php?record_update=<h2>Your content has been Updated........!</h2>','_self')</script>";

}
else
{
echo " not update successfully";

}
}


?>