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
/*session_start();

if(!$_SESSION['username'])
{

header("location:admin_login.php");

}
*/

?>
<!----Code for edit product or displey product ----->

<?php 

 $product_edit=@$_GET['pro_edit'];
  $edit_product="select  * from products WHERE product_id='$product_edit'";
 $run=mysql_query($edit_product);

while($row=mysql_fetch_array($run))
{
  $prod_id=@$row['product_id'];
 $prod_cat=$row['cat_id'];
 $prod_brand=$row['brand_id'];
 $prod_title=$row['product_title'];

 $prod_price=$row['product_price'];

 $prod_details=$row['product_desc'];

 $prod_keyword=$row['keyword'];
 $prod_status=$row['status'];

 $prod_img1=$row['img1'];
 $prod_img2=$row['img2'];
 $prod_img3=$row['img3'];

 $date=$row['date'];

 }
 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Only Allow Here </title>
<link rel="stylesheet" href="style/wraper.css">

<style type="text/css">

td{
font-size:20px;
color:#FFFFFF;

}



.admin_box{
width:870px;
height:600px;

}

.admin_image_box{
width:70px;
height:70px;
background-color:#333300;
float:right;
margin:auto;


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
<!--<div class="wraper_navigation">

</div>
-->
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
<li><a href="admin_logout.php">Logout</a><li>

</ul>
</div>
<div class="wraper_right_content" style="background-color:#999999;">

<div class="admin_image_box">



</div>

<div class="admin_welcome_box">

</div>
<div class="admin_box">



<form action="product_edit.php" method="post" enctype="multipart/form-data">

<table border="1" width="500" align="center" style="margin-top:60px; border:2px solid #FFFFFF;">

<tr>
<td colspan="2" align="center" style="color:#FFFFFF; font-size:28px;"><b>Insert New Product</b></td>
</tr>

<tr>
<td>Product Title</td>
<td><input type="text" name="pro_title" size="40" value="<?php  echo $prod_title; ?>"/></td>
</tr>

<tr>
<td>Product Categories</td>
<td><select name="pro_cat" value="<?php  echo $prod_id; ?>">
<option>Select Categories</option>

<?php

$gets_cat="select *from  categories";

$run_cat=mysql_query($gets_cat);

while($row_cat=mysql_fetch_array($run_cat))
{
$cat_id=$row_cat['cat_id'];
$cat_name=$row_cat['cat_name'];
echo "<option value='$cat_id'>$cat_name</option>";


}
?>


</select></td>
</tr>

<tr>
<td>Product Brand</td> 
<td><select name="pro_brand">
<option>Select Categories</option>

<?php

$gets_brand="select *from  brand";

$run_brand=mysql_query($gets_brand);

while($row_brand=mysql_fetch_array($run_brand))
{
$brand_id=$row_brand['brand_id'];
$brand_name=$row_brand['brand_name'];
echo "<option value='$brand_id'>$brand_name</option>";


}
?>

</select></td>
</tr>

<tr>
<td>Product Image1 </td>
<td><input type="file" name="pro_img1" value="<?php  echo $prod_img1; ?>"/></td>
</tr>

<tr>
<td>Product Image2</td>
<td><input type="file" name="pro_img2"  value="<?php  echo $prod_img2; ?>"/></td>
</td>
</tr>

<tr>
<td>Product Image3</td>
<td><input type="file" name="pro_img3"  value="<?php  echo $prod_img3; ?>"/></td>
</tr>

<tr>
<td>Product Price</td>
<td><input type="text" name="pro_price" size="20" value="<?php  echo $prod_price; ?>"/></td>
</tr>

<tr>
<td>Product Details</td>
<td><textarea name="pro_details" cols="30" rows="2" value="<?php  echo $prod_details; ?>"></textarea></td>
</tr>

<tr>
<td>Product Keyword</td>
<td><input type="text" name="pro_keyword" size="40" value="<?php  echo $prod_keyword; ?>"/></td>
</tr>
<tr>
<td>Product Status</td>
<td><input type="text" name="pro_status" size="20" value="<?php  echo $prod_status; ?>"/></td>
</tr>
<tr>
<td>Date</td>
<td><input type="text" name="date" size="20" value="<?php  echo $date; ?>"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="update" value="Update"/></td>
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
 