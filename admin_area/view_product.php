
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>View Customer Delails </title>
<style type="text/css">
body{
background-color:#666666;


}

td{
color:#FFFF00;


}
a:link
{
text-decoration:none;
}
a:hover{
color:#FFFFFF;
font-size:20px;

}

</style>
</head>

<body>

<?php echo @$_GET['product_deleted'];?>



<form action="view_product.php" method="post" name="customer" enctype="multipart/form-data">

<table  align="center" border="2" style="margin-top:90px; width:1300px;">
<tr>
<th style="color:#FFFFFF;">Product Id</th>
<th style="color:#FFFFFF;">Product Title</th>
<th style="color:#FFFFFF;">Product Categorias</th>

<th style="color:#FFFFFF;">Product Brand</th>
<th style="color:#FFFFFF;">Product Image</th>
<th style="color:#FFFFFF;">Product Price</th>
<th style="color:#FFFFFF;">Product Details</th>
<th style="color:#FFFFFF;">Product Keyword</th>
<th style="color:#FFFFFF;">Status</th>
<th style="color:#FFFFFF;">Date</th>
<th>Delete</th>
<th>Edit</th>

</tr>
<tr>
<?php 
$show="select *from  products";
$run3=mysql_query($show);
while($row=mysql_fetch_array($run3))
{

  $pro_id=@$row['product_id'];
 $pro_cat=$row['cat_id'];
 $pro_brand=$row['brand_id'];
 $pro_title=$row['product_title'];

 $pro_price=$row['product_price'];

$pro_details=$row['product_desc'];

$pro_keyword=$row['keyword'];
$pro_status=$row['status'];

$pro_img1=$row['img1'];

$date=$row['date'];
?>

<td align="center"><?php  echo $pro_id ; ?></td>
<td align="center"><?php echo $pro_title; ?></td>
<td align="center"><?php echo $pro_cat; ?></td>

<td  align="center"><?php echo $pro_brand; ?></td>
<td  align="center"><?php echo $pro_img1; ?></td>
<td  align="center"><?php echo $pro_price; ?></td>
<td  align="center"><?php  echo $pro_details; ?></td>
<td  align="center"><?php  echo $pro_keyword; ?></td>
<td  align="center"><?php  echo $pro_status; ?></td>
<td  align="center"><?php  echo $date; ?></td>
<td  align="center"><a href="product_delete.php?pro_delete=<?php echo $pro_id; ?>">Delete</a></td>
<td  align="center"><a href="Product_edit.php?pro_edit=<?php  echo $pro_id; ?>">Edit</a></td>
</tr>
<?php  } ?>

</table>
</form>


</body>
</html>
