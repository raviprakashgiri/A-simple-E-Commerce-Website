
<?php  
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
height:630px;
background-color:#996666;
}

.image_box{
width:180px;
height:630px;
float:left;
background-color:#009966;
}

.details_box{
width:670px;
height:630px;
background-color:#009966;
float:right;
}

.image1_box{
width:180px;
height:180px;
float:left;
margin-left:15px;
margin-bottom:5px;
}

.image2_box{
width:180px;
height:180px;
float:left;
margin-left:15px;
margin-bottom:0px;}

.image3_box{
width:180px;
height:180px;
float:left;
margin-left:15px;
margin-bottom:0px;
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

<div class="left_content_page" style="width:200px; height:700px;">
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
Welcome:Guest</br>
<p style="font-size:18px; margin-top:13px; margin-left:30px;"><a href="customer_login.php" style="text-decoration:none; ">Login Here</a><p>
</div>
</div>

<div id="itempart_right_content_page">
<div id="item_right_content_page" style="text-align:center;">
Item:  <a href="go_to_cart.php" style="text-decoration:none;color:#663300; "> <?php total_items(); ?></a>
</div>
<div id="price_right_content_page">
price: <a href="go_to_cart.php" style="text-decoration:none; color:#663300;">Rs.<?php total_price() ;?></a><br>
<a href="go_to_cart.php" style="text-decoration:none; font-size:18px; float:left;">Go to Cart</a>
</div>
</div>

</div>
<?php cart(); ?>
<div class="product_box">

<div class="image_box">
<div class="image1_box">
<?php 
if(isset($_GET['pro_id']))                             // script for display Image
{

 $product_id=$_GET['pro_id'];

$get="select * from products where product_id='$product_id' ";
$get1=mysql_query($get);

while($get_product=mysql_fetch_array($get1))
{
 $pro_id=$get_product['product_id'];


 $pro_cat=$get_product['cat_id'];
 $pro_brand=$get_product['brand_id'];
 $pro_title=$get_product['product_title'];
 $pro_img1=$get_product['img1'];
 $pro_img2=$get_product['img2'];
 $pro_img3=$get_product['img3'];

 $pro_price=$get_product['product_price'];
 $pro_details=$get_product['product_desc'];
 $pro_keyword=$get_product['keyword'];
 $pro_status=$get_product['status'];

}
}

 echo "<img src='admin_area/photo/$pro_img1' width='170' height='170' style='border:2px solid black;'></a>"; 
 
 ?>
</div>
<div class="image2_box">

<?php  echo "<img src='admin_area/photo/$pro_img2' width='150' height='150' style='border:2px solid black;'></a>"; 
?>
</div>
<div class="image3_box">
<?php  echo "<img src='admin_area/photo/$pro_img2' width='150' height='150' style='border:2px solid black;'></a>"; 
?>

</div>

</div>
<div class="details_box">

<table border="1"  style="margin:100px; width:550px;">

<tr>
<td colspan="2" align="center" style="font-size:24px; color:#FFFFFF;">Product Details</td>

</tr>

<?php                                        // script for display details of product
if(isset($_GET['pro_id']))
{

 $product_id=$_GET['pro_id'];

$get="select * from products where product_id='$product_id' ";
$get1=mysql_query($get);

while($get_product=mysql_fetch_array($get1))
{
 $pro_id=$get_product['product_id'];


 $pro_cat=$get_product['cat_id'];
 $pro_brand=$get_product['brand_id'];
 $pro_title=$get_product['product_title'];
 $pro_img1=$get_product['img1'];
 $pro_img2=$get_product['img2'];
 $pro_img3=$get_product['img3'];

 $pro_price=$get_product['product_price'];
 $pro_details=$get_product['product_desc'];
 $pro_keyword=$get_product['keyword'];
 $pro_status=$get_product['status'];

}
}
?>



<tr>
<td style="font-size:18px; color:#FFFFFF;">Product Title</td>
<td style="font-size:18px; color:#CCFF00;"><?php echo $pro_title ;?></td>

</tr>
<tr>
<td style="font-size:18px; color:#FFFFFF;">Product Price</td>
<td style="font-size:18px; color:#CCFF00;">Rs: <?php echo $pro_price ;?></td>

</tr>
<tr>
<td style="font-size:18px; color:#FFFFFF;">Product Details</td>
<td style="font-size:18px; color:#CCFF00;"><?php echo $pro_details ;?></td>

</tr>

<tr>
<td style="font-size:18px; color:#FFFFFF;">Product Status</td>
<td style="font-size:18px; color:#CCFF00;"><?php echo $pro_status ;?></td>

</tr>

<tr>
<td style="font-size:18px; color:#FFFFFF;" align="center"><button style="font-size:19px;"><a href="index.php" style="text-decoration:none; color:#663300;"><strong>Back</strong></a></button></td>
<td align="center"><a href='details.php?add_cart=$pro_id'><button name='add_to_cart' style="font-size:19px; color:#660000;">Add To Cart</button></a></td>

</tr>

</table>





</div>

</div>
</div>
</div>



</div>
<!--content page end -->


<!--<div class="footer_page">

<img src="image/footer.jpg">
</div> --->

</div>


</body>
</html>

