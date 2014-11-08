<?php  
 include("includes/connect_db.php");

//include("functions/function.php");
include("functions/functions.php");

session_start();
?>

<html>

<head><title>Cart Page</title>
<style type="text/css">
body{
background-color:#330000;

}

.container
{
background-color:#333300;
width:1000px;
height:auto;
margin:auto;
}
.header
{
background-color:#003333;
width:1000px;
height:100px;
margin:auto;
}
.contant_page
{
background-color:#666666;
width:1000px;
height:auto;
margin:auto;
float:right;
}

.footer{

width:1000px;
height:100px;
background-color:#333366;
both:clear;
}


</style>

</head>



<body>


<form action="cart.php" method="post" name="go_to_cart" enctype="multipart/form-data">
<div class="container">
<div class="header">

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


/* $price=array($p_price['product_price']);
$total_price=array_sum($price);

$total+=$total_price; */


?>
<td align="center"><input type="checkbox" name="remove[]" value=<?php echo $pro_id; ?>/></td>
<td align="center" style="font-size:14px; color:#FFFFFF;"><?php echo $pro_title; ?><br><?php echo "<img src='admin_area/photo/$pro_img1' width='70' height='35'>"; ?></td>
<td align="center"><input type="text "name="quantity" value="<?php echo $_SESSION['quantity']; ?>" size="5"></td>
<td align="center" style="color:#FFFFFF;">Rs: <?php echo $pro_single_price; ?></td>
<td align="center" style="color:#FFFFFF;">Rs: <?php echo $pro_single_price; ?></td>
<td><input type="submit" name="qty_up" value="Update"></td>
<?php



foreach($_POST['quantity'] as $qty_id)
{
if(isset($_POST['update_cart']))
{
$ip=getIp();

$q=$_POST['quantity'];
$u="update cart set quantity='$q' where ip_address='$ip' AND p_id='$qty_id'";
$qt=mysql_query($u);
$_SESSION['quantity']=$q;
/* if($qt)
{

$sub=$q*$pro_single_price;
$insert="insert into cart(price,subtotal) values('$pro_single_price','$sub') where ip_address='$ip' AND p_id='$pro_id'";
$st=mysql_query($insert);
*/

}
}
?>
</tr>

<?php }}?>

<tr>
<td colspan="6" align="center" style="font-size:20px; color:#CCCC00;">
Total Price: <?php //echo $total; ?>
</td>
</tr>

<tr>
<td align="center" colspan="2"><input type="submit" name="update_cart" value="Delete"></td>
<td colspan="2" align="center" ><input type="submit" name="continue" value="Continue Shoping"></td>

<td align="center" colspan="2"><button><a href="checkout.php" style="text-decoration:none; font-size:14px; color:#000000;">Checkout</a></button></td>


</tr>

</table>



</form>
</div>

<div class="footer">

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
echo "<script>window.open('cart.php','_self')</script>";

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


?>