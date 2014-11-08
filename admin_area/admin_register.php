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
<title>Administrator Only Allow Here </title>
<link rel="stylesheet" href="style/wraper.css">
<style>
table
{

background-color:#999999;
border:2px solid #330000;
margin-top:60px;
}
th{
background-color:#3300FF;
font-size:22px;
border:1px solid #330000;
text-align:center;
color:#FFFFFF;

}
td{
border:1px solid #330000;
font-size:16px;
color:#FFFFFF;

}
body {

background-color:#666666;
}




</style>
<script src="js/validation.js" type="text/javascript"></script>

</head>

<body>

<form name="register" action="admin_register.php" method="post" enctype="multipart/form-data" ">

<table  border="1" width="450px" height="400px" align="center">
<tr>
<th colspan="2">New Administrator Register Here</th>

</tr>

<tr>
<td>First Name</td>

<td><input type="text" name="first_name" size="30" ></td>
</tr>

<tr>
<td>Last Name</td>

<td><input type="text" name="last_name" size="30" ></td>
</tr>
<tr>

<tr>


<td>Email</td>
<td><input type="text" name="email"  size="30" id="email" ></td>

</tr>

<td>Gender</td>
    <td><input name="gender" type="radio" value="Male"  checked="checked"/>
      Male
        <input name="gender" type="radio" value="Female" /> 
        Female </td>
</tr>
<tr>
<tr>
<td>Residance_Add</td>
    <td><textarea name="resid_add" cols="30" rows="2"></textarea></td>

</tr>
<tr>
<td>Parmanent_Add</td>
    <td><textarea name="par_add" cols="30" rows="2"></textarea></td>

</tr>
<tr>
<td>Mobile</td>
<td><input type="text" name="mobile"  size="20" ></td>

</tr>
<tr>
<td>Identy_proof</td>
<td><input type="text" name="proof"  size="30" ></td>

</tr>
<tr>
<td>Image</td>
<td><input type="file" name="image"  size="30" ></td>

</tr>

<tr>
<td colspan="2" align="center"><input type="submit" name="submit"  value="Submit"></td>

</tr>
</table>




</form>




</body>



</html>








<?php


if(isset($_POST['submit']))

{
 $random_pass=str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789");
  $password=substr($random_pass,0,8);
 
 
 


  $first_name=$_POST['first_name'];
  $length=strlen($first_name);            //for find the length of first name
  
  
   
   $last_name=$_POST['last_name'];

 $email=$_POST['email'];
 $gender=$_POST['gender'];

 $resid_add=$_POST['resid_add'];
 $par_add=$_POST['par_add'];
 $mobile=$_POST['mobile'];
$proof=$_POST['proof'];

$image=$_FILES['image']['name'];
$temp=$_FILES['image']['tmp_name'];
$dir="admin_image/".$image;
move_uploaded_file($temp,$dir);


 $user1=substr($first_name,0,$length);          // substr function use on first_name
$user2=substr($mobile,5,3);                        // substr function use on mobile 3 element from mobile number

 $user_name="$user1"."$user2";
 
 
 
 $query1="select * from administrator where admin_email='$email'";
 $run1=mysql_query($query1);
 
 if(mysql_num_rows($run1)==1)
 {
 echo "<script>alert('Email already exist please try another one')</script>";
 exit();
 }
  
  else
  {
 $query="insert into  administrator (admin_user_name,admin_pass_word,admin_first_name,admin_last_name,admin_email,admin_gender,admin_resd_address,admin_par_address,admin_mobile,identy_proof,date,admin_image)
  values('$user_name','$password','$first_name','$last_name','$email','$gender','$resid_add','$par_add','$mobile','$proof',NOW(),'$image')";
  
  $run=mysql_query($query);
  
  if($run)
  {
  echo "<script>window.open('admin.php','_self')</script>";
  }


}
}
?>





