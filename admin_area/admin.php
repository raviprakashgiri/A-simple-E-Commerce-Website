


<?php
session_start();

if(!$_SESSION['username'])
{

header("location:admin_login.php");

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

color:#663300;
font-size:24px;
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
<li><a href="customer.php">Account</a><li>
</ul>
</div>
<div class="wraper_right_content" style="background-color:#999999;">
<div class="admin_box">

<div class="admin_image_box">


 <?php 
 //echo "<img src='admin_area/admin_image/$_SESSION['admin_image']'/>";
 
 ?>


</div>

<div class="admin_welcome_box">

Welcome: <?php echo $_SESSION['username'];?>
<a href="admin_logout.php" style="text-decoration:none; margin-left:50px;">Logout</a>

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





?>