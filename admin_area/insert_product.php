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

<div class="admin_box">

<div class="admin_image_box">



</div>

<div class="admin_welcome_box">
Welcome: <?php echo $_SESSION['username'];?>
<a href="admin_logout.php" style="text-decoration:none; margin-left:50px;">Logout</a>
<form action="insert_product.php" method="post" enctype="multipart/form-data">

<table border="1" width="500" align="center" style="margin-top:60px; border:2px solid #FFFFFF;">

<tr>
<td colspan="2" align="center" style="color:#FFFFFF; font-size:28px;"><b>Insert New Product</b></td>
</tr>

<tr>
<td>Product Title</td>
<td><input type="text" name="pro_title" size="40"/></td>
</tr>

<tr>
<td>Product Categories</td>
<td><select name="pro_cat">
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
<td><input type="file" name="pro_img1"/></td>
</tr>

<tr>
<td>Product Image2</td>
<td><input type="file" name="pro_img2"/></td>
</td>
</tr>

<tr>
<td>Product Image3</td>
<td><input type="file" name="pro_img3"/></td>
</tr>

<tr>
<td>Product Price</td>
<td><input type="text" name="pro_price" size="20"/></td>
</tr>

<tr>
<td>Product Details</td>
<td><textarea name="pro_details" cols="30" rows="2"></textarea></td>
</tr>

<tr>
<td>Product Keyword</td>
<td><input type="text" name="pro_keyword" size="40"/></td>
</tr>
<tr>
<td>Product Status</td>
<td><input type="text" name="pro_status" size="20"/></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="insert" value="Insert"/></td>
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
if(isset($_POST['insert']))

{
 $pro_title=$_POST['pro_title'];
 $pro_cat=$_POST['pro_cat'];
 $pro_brand=$_POST['pro_brand'];
 $pro_price=$_POST['pro_price'];
$pro_details=$_POST['pro_details'];
 $pro_keyword=$_POST['pro_keyword'];
 $pro_status=$_POST['pro_status'];


 $pro_img1=$_FILES['pro_img1']['name'];
 $pro_img2=$_FILES['pro_img2']['name'];
 $pro_img3=$_FILES['pro_img3']['name'];


 $temp_img1=$_FILES['pro_img1']['tmp_name'];
 $temp_img2=$_FILES['pro_img2']['tmp_name'];
 $temp_img3=$_FILES['pro_img3']['tmp_name'];
$dir1="photo/".$pro_img1;
$dir2="photo/".$pro_img2;

$dir3="photo/".$pro_img3;


move_uploaded_file($temp_img1,$dir1);
move_uploaded_file($temp_img2,$dir2);
move_uploaded_file($temp_img3,$dir3);


$insert="insert into products (cat_id,brand_id,date,product_title,img1,img2,img3,product_price,product_desc,keyword,status) values ('$pro_cat','$pro_brand',NOW(),'$pro_title','$pro_img1','$pro_img2','$pro_img3','$pro_price','$pro_details','$pro_keyword','$pro_status')";
$run=mysql_query($insert);
if($run)
{
echo "file uploaded";

}
else
{

echo "file not uploaded";
}


}




?>