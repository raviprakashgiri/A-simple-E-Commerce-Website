
 <?php

include("../includes/connect_db.php"); 
?>
<?php

session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Login</title>
<link rel="stylesheet" href="style/admin_css.css" media="all" />
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body>
<center><div class="admin_main" align="center">

<div class="admin_header">
<img src="image/admin_header.jpg">


</div>
<div class="admin_content">
<div class="admin_login">
<form action="admin_login.php" method="post" enctype="multipart/form-data">

<table width="600" height="200" align="center">
  <tr>
    <th colspan="2"  align="center"><span class="style1">Administrator Login Only</span></th>
    </tr>
  <tr>
    <th align="center"><span class="style1">User Name</span> </th>
    <td><input name="username" type="text" id="username" size="30" /></td>
  </tr>
  <tr>
    <th  align="center"> <span class="style1">Password</span></th>
    <td><input name="password" type="password" id="password" size="30" /></td>
  </tr>
  <tr>
    <th colspan="2"><input name="submit" type="submit" id="submit" value="Login" size="20" /></th>
    </tr>
  <tr>
    <th colspan="2"  align="center"><span class="style1">
	
	<div class="forget">
	
	<a href="admin_forget_pass.php">Forget Password ?</a></div>
	<a href='admin_change_pass.php'>Change Password ?</a></div>
	</span></th>
    </tr>
	<tr>
    <th colspan="2"  align="center"><span class="style1"><a href="admin_register.php">New Administrator Register Here </a></span></th>
    </tr>
</table>
</form>

</div>
<div class="admin_footer">
<img src="image/ecommerce_header.jpg"></div>


</div></center>

</body>
</html>
<?php 

if(isset($_POST['submit']))

{
$first=$_GET['first_name'];
 $username=$_POST['username'];
 $password=$_POST['password'];

$query="select * from administrator where admin_user_name='$username' AND admin_pass_word='$password'";

$run=mysql_query($query);
if(mysql_num_rows($run)>0)
{
$_SESSION['username']=$username;

echo "<script>window.open('admin.php','_self')</script>";

}
else{
echo "<script>alert('Username or Password are Incorrect')</script>";

}
}

//script for forming session and display image

$ses="select * from administrator where admin_user_name='$username' AND admin_pass_word='$password'";
$session=mysql_query($sel);
if($fetch=mysql_fetch_array($session))
{
$image=$fetch['admin_image'];

}

?>