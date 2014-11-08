
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
Welcome:Guest </br>
<!--<p style="font-size:18px; margin-top:13px; margin-left:30px;"><a href="cust_login.php" style="text-decoration:none; ">Login Here</a><p>
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

<div class="product_box" style="width:850px; height:793px; margin-top:35px;">

<form action="customer_register.php" method="post" enctype="multipart/form-data" name="customer_register">

<table border="1" align="center">

<tr>
<th colspan="2" align="center" style="color:#FFFFFF; font-size:25px;">New Customer Register Here </th>

</tr>

<tr>
<td align="center">First Name</td>
<td><input type="text" name="first" size="30"></td>

</tr>

<tr>
<td align="center">Last Name</td>
<td><input type="text" name="last" size="30"></td>

</tr>

<tr>
<td align="center">Email Id</td>
<td><input type="text" name="email" size="30"></td>

</tr>
<tr>
<td align="center">Password</td>
<td><input type="password" name="password" size="30"></td>

</tr>

<tr>
<td align="center">Gender</td>
<td><input type="radio" name="gender" value="Male" checked="checked"/>Male
<input type="radio" name="gender" value="Female"/>Female
</td>

</tr>

<tr>
<td align="center">Residance_Add</td>
    <td><textarea name="resi" cols="30" rows="1"></textarea></td>

</tr>
<tr>
<td align="center">Parmanent_Add</td>
    <td><textarea name="par" cols="30" rows="1"></textarea></td>

</tr>
<tr>
<td align="center">Mobile</td>
<td><input type="text" name="mobile"  size="30" ></td>

</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="submit" value="Submit"></td>

</tr>
</table>








</form>


<?php


if(isset($_POST['submit']))

{
// $random_pass=str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789");
 // $password=substr($random_pass,0,8);
 
 
$ip=getIp();


  $first=$_POST['first'];
 // $length=strlen($first);            //for find the length of first name
  
  
   
   $last=$_POST['last'];

 $email=$_POST['email'];
  $password=$_POST['password'];

 $gender=$_POST['gender'];

 $resi=$_POST['resi'];
 $par=$_POST['par'];
 $mobile=$_POST['mobile'];

// $user1=substr($first,0,$length);          // substr function use on first_name
// $user2=substr($mobile,6,2);                        // substr function use on mobile 3 element from mobile number

 // $user_name="$user1"."$user2";
 
 
 $query1="select * from  customer where cust_email='$email'";
 $run1=mysql_query($query1);
 
 if(mysql_num_rows($run1)==1)
 {
 echo "<script>alert('Email already exist please try another one')</script>";
 exit();
 }
  
  else
  {
  
 $query="insert into  customer (cust_ip_add,cust_first_name , cus_last_name , cust_email ,cust_pass, gender , cust_resi_address , cus_par_add , cust_mobile , date)
  values('$ip','$first','$last','$email','$password','$gender','$resi','$par','$mobile',NOW())";
  
  $run=mysql_query($query);
  
  /*if($run)
  {
  echo "<script>alert('register success')</script>";
}
else
{
  echo "<script>alert('register not success')</script>";

}
}
}*/
$select="select * from cart where ip_address='$ip'";
$sel_run=mysql_query($select);
$checkout=mysql_num_rows($sel_run);
if($checkout==0)
 {
$_SESSION['cust_email']=$email;
echo "<script>alert('your account has been created successfully , Thanks')</script>";

echo "<script>window.open('customer/customer_account.php' , '_self')</script>";
}
else
{
$_SESSION['cust_email']=$email;
echo "<script>alert('your account has been created successfully , Thanks')</script>";

echo "<script>window.open('check_out.php' , '_self')</script>";

}
}
}
?>


</div>
</div>
</div>



</div>
<!--content page end 
-->
<div class="footer_page">

<!--<img src="image/footer.jpg">
--></div>

</div>

<div style="height:70px; width:1053px; clear:both; background-color:#663300; margin:auto;" >


</div>


</body>
</html>
