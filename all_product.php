
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
?> </div></br>
<div style="margin-left:50px; margin-bottom:5px;" >

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
<!--<p style="font-size:18px; margin-top:13px; margin-left:30px;"><a href="customer_login.php" style="text-decoration:none; ">Login Here</a><p>
--></div>
</div>

<div id="itempart_right_content_page">
<div id="item_right_content_page" style="text-align:center;">
Item:  <a href="go_to_cart.php" style="text-decoration:none;color:#663300; "> <?php total_items(); ?></a>
</div>
<div id="price_right_content_page">
price: <a href="go_to_cart.php" style="text-decoration:none; color:#663300;">Rs.<?php total_price() ;?></a><br>
<a href="go_to_cart_page.php" style="text-decoration:none; font-size:18px; float:left;">Go to Cart</a>
</div>
</div>

</div>
<?php cart(); ?>
<div class="product_box" style="width:850px; height:793px;">

<?php
 get_all_product();           //call  function to display all  products
get_cat_display() ;         //call  function to display  products by categories
get_brand_display()           ////call  function to display  products  by brand
?>
</div>
</div>
</div>



</div>
<!--content page end -->


<!--<div class="footer_page">

<img src="image/footer.jpg">
</div> --->

</div>

<!--code for footer--->
<div style="height:70px; width:1053px; clear:both; background-color:#663300; margin:auto;" >
<!--first left div code for footer--->
<div style="height:70px; width:300px;  float:left;" >



</div>

<div style="height:70px; width:753px;   float:right;" >

<div style="height:70px; width:453px;   float:left; text-align:center;" >

<div style="height:15px; width:453px;   float:left; text-align:center;" >



</div>

<div style="height:55px; width:453px;   float:right; text-align:center;" >

<?php pagination();?>


</div>

</div>


<div style="height:70px; width:300px;  float:right;" >



</div>


</div>



</div>


</body>
</html>
