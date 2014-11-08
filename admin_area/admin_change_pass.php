
<?php

include("../includes/connect_db.php"); 

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<form action="admin_change_pass.php" method="post" enctype="multipart/form-data">

Old Password:<input type="password" name="old" size="30" /><br>
 
New Password:<input type="password" name="new"  size="30"/><br/>
Repeat New Password:<input type="password" name="confirm" size="30" /><br>
<input type="submit" name="change" Value="Change Password" />


</form>

</body>
</html>

<?php 

if(isset($_POST['change']))
{
$old_pass=$_POST['old']
$old_pass=$_POST['new']
$old_pass=$_POST['confirm']


}

?>