
<?php  
session_start();
 include("includes/connect_db.php");

include("functions/function.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>My Shopping Cart Website</title>
<link rel="stylesheet" href="style/style.css" media="all"/>
<style>
.product_box{
width:850px;
background-color:#996666;

}
.product{
width:180px;
height:230px;
float:left;
margin-top:25px;
margin-left:25px;


}
.title{
width:180px;
height:25px;
text-align:center;
font-size:20px;
color:#000000;

}
.box{
width:180px;
height:205px;

}

.image{
width:160px;
height:160px;
margin:auto;
border:2px solid #333333;
}
.box1{
width:180px;
height:45px;

}

.price_content{
width:180px;
height:22px;
}

.ad_to_cart{
width:180px;
height:23px;
}

.details{
width:90px;
height:22px;
float:left;
text-align:center;
font-size:18px;
color:#000033;
}
.details a{
text-decoration:none;
}
.price{
width:90px;
height:22px;
float:right;
text-align:center;

}
</style>
</head>

<body>

<div class="main_page">

<div class="header_page">
<a href="index.php"><img src="image/Header19.jpg" style="float:left"></a>
<img src="image/Header-1.jpg" style="float:right">

</div>

<div class="navigation_page">
<ul id="link">
<li><a href="index.php">Home</a></li>
<li><a href="all_product.php">All Product</a></li>
<li><a href="customer_register.php">Sign Up</a></li>
<li><a href="shopping_cart.php">Shopping Cart</a></li>
<li><a href="contact_us.php">Contact Us</a></li>
<li><a href="my_account.php">My Account</a></li>

</ul>

</div>
<!--content page start -->

<div class="content_page">

<div class="left_content_page" style="width:200px; height:860px;">
<!-- for categories-->
<div id="sidebar_title">Categories</div>

<ul id="cat">
<?php

getcat();      //categories function call
?>
</ul>
<!-- for brand-->

<div id="sidebar_brand">Brand</div>
<ul id="brand">
<?php

 getbrand()
?>
</ul> 






</div>


<div class="right_content_page">
<div id="cart_right_content_page">

<div id="welcomepart_right_content_page" >
<div id="search_right_content_page">
<form action="search_product.php" method="get" enctype="multipart/form-data">
<input type="text" name="search" placeholder="Search a Product" size="30px">
<input type="submit" name="submit" value="Search">

</form>
</div>
<div id="welcome_right_content_page">
<div style="font-size:17px;">
<?php
if(isset($_SESSION['cust_email']))
{
echo $_SESSION['cust_email'];

}
else
{
echo "Welcome:Guest";
}
?> 
</div></br>
<div style="margin-top:0px; margin-left:50px;" >

<?php 
if(!isset($_SESSION['cust_email']))
{

echo "<a href='check_out.php' style='font-size:20px; padding-left:10px; text-decoration:none; color:black;'>Login</a>";

}
else
{
echo "<a href='logout.php' style='font-size:20px; padding-left:10px; text-decoration:none; color:black;'>Logout</a>";

}

?>
</div>
<!--<p style="font-size:18px; margin-top:13px; margin-left:30px;"><a href="cust_login.php" style="text-decoration:none; ">Login Here</a><p>
-->

</div>
</div>

<div id="itempart_right_content_page">
<div id="item_right_content_page" style="text-align:center;">
Item:  <a href="go_to_cart.php" style="text-decoration:none;color:#663300; "> <?php total_items(); ?></a>
</div>
<div id="price_right_content_page">
price: <a href="go_to_cart.php" style="text-decoration:none; color:#663300;">Rs.<?php total_price() ;?></a><br>
<a href="index.php" style="text-decoration:none; font-size:18px; float:left;">Back to Shopping</a>



<?php 
/*if(!isset($_SESSION['cust_email']))
{

echo "<a href='checkout.php' style='font-size:18px; padding-left:10px; text-decoration:none; color:red;'>Login</a>";

}
else
{
echo "<a href='logout.php' style='font-size:18px; padding-left:10px; text-decoration:none; color:red;'>Logout</a>";

}
*/
?>
</div>
</div>

</div>
<?php cart(); ?>
<div class="product_box" style="width:850px; height:793px;">

<form action="go_to_cart_page.php" method="post" name="go_to_cart" enctype="multipart/form-data">
<div class="container">
<div class="header">
<div style="margin-top:0px; margin-left:300px;" >

</div>
</div>

<div class="contant_page">
<table align="center" border="1" width="600" style="margin-top:50px;">
<tr>
<th colspan="5" style="font-size:26px; color:#FFFFFF;">Your Cart</th>
</tr>

<tr>
<th style="font-size:20px;">Remove</th>
<th style="font-size:20px; ">Products</th>
<th style="font-size:20px;">Quantity</th>
<th style="font-size:20px; ">Price</th>
<th style="font-size:20px; ">Subtotal</th>

</tr>

<tr>
<?php
$total=0;

$ip=getIP();

$price_product="select *from cart where ip_address='$ip'";

$price_run=mysql_query($price_product);

while($price_select=mysql_fetch_array($price_run))

{

$pro_id=$price_select['p_id'];
$price="select * from products where product_id='$pro_id'";

$item_price=mysql_query($price);

while($p_price=mysql_fetch_array($item_price))
{
$pro_single_price=$p_price['product_price'];
$pro_img1=$p_price['img1'];
$pro_title=$p_price['product_title'];

$price=array($p_price['product_price']);
$total_price=array_sum($price);

$total+=$total_price;




?>
<td align="center"><input type="checkbox" name="remove[]" value=<?php echo $pro_id; ?>/></td>
<td align="center" style="font-size:14px; color:#FFFFFF;"><?php echo $pro_title; ?><br><?php echo "<img src='admin_area/photo/$pro_img1' width='70' height='35'>"; ?></td>
<td align="center"><input type="text "name="quantity" value="1" size="5"></td>
<td align="center" style="color:#FFFFFF;">Rs: <?php echo $pro_single_price; ?></td>
<td>abc</td>
<td><input type="submit" name="qty_up" value="Update"></td>
</tr>

<?php }}?>

<tr>
<td colspan="6" align="center" style="font-size:20px; color:#CCCC00;">
Total Price: <?php echo $total; ?>
</td>
</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="update_cart" value="Delete"></td>
<td colspan="2" align="center" ><input type="submit" name="continue" value="Continue Shoping"></td>

<td align="center" colspan="2"><button><a href="check_out.php" style="text-decoration:none; font-size:14px; color:#000000;">Checkout</a></button></td>


</tr>

</table>



</form>
</div>


</div>


</body>
</html>


<?php   

function update_qty()
{
                                      //script for update cart
if(isset($_POST['update_cart']))
{
$ip=getIp();


foreach($_POST['remove'] as $remove_id)
{


$delete_product="delete from cart where p_id='$remove_id' AND  ip_address='$ip'";

$run_delete=mysql_query($delete_product);

if($run_delete)
{
echo "<script>window.open('go_to_cart_page.php','_self')</script>";

}

}

}

if(isset($_POST['continue']))
{

echo "<script>window.open('index.php','_self')</script>";

}

}

?>

<?php  @update_qty(); ?>