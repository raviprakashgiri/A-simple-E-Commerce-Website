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

<p><?php echo @$_GET['cust_deleted'];?></p>



<form action="customer.php" method="post" name="customer" enctype="multipart/form-data">

<table  align="center" border="2" style="margin-top:90px; width:1300px;">
<tr>
<th style="color:#FFFFFF;">Id</th>
<th style="color:#FFFFFF;">Username</th>
<th style="color:#FFFFFF;">Password</th>

<th style="color:#FFFFFF;">First Name</th>
<th style="color:#FFFFFF;">Last Name</th>
<th style="color:#FFFFFF;">Email</th>
<th style="color:#FFFFFF;">Gender</th>
<th style="color:#FFFFFF;">Resi_Add</th>
<th style="color:#FFFFFF;">Par_Add</th>
<th style="color:#FFFFFF;">Mobile</th>
<th style="color:#FFFFFF;">Date</th>
<th>Delete</th>
</tr>
<tr>
<?php 
$show="select *from  customer";
$run3=mysql_query($show);
while($row=mysql_fetch_array($run3))
{

$cust_id=$row['cus_id'];
$cust_ip=$row['cust_ip_add'];

//$username=$row['cust_user_name'];
$password=$row['cust_pass'];

$first=$row['cust_first_name'];
$last=$row['cus_last_name'];
$email=$row['cust_email'];
$gender=$row['gender'];
$resi=$row['cust_resi_address'];
$par=$row['cus_par_add'];
$mobile=$row['cust_mobile'];
$date=$row['date'];
?>

<td align="center"><?php echo $cust_id; ?></td>
<td align="center"><?php echo $cust_ip; ?></td>
<td align="center"><?php echo $password; ?></td>

<td  align="center"><?php echo $first; ?></td>
<td  align="center"><?php echo $last; ?></td>
<td  align="center"><?php echo $email; ?></td>
<td  align="center"><?php echo $gender; ?></td>
<td  align="center"><?php echo $resi; ?></td>
<td  align="center"><?php echo $par; ?></td>
<td  align="center"><?php echo $mobile; ?></td>
<td  align="center"><?php echo $date; ?></td>
<td  align="center"><a href="cust_delete.php?cust_delete=<?php echo $cust_id; ?>">Delete</a></td>

</tr>
<?php } 

?>

</table>
</form>


</body>
</html>
