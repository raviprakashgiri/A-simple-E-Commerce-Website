
<?php  
//session_start();
 include("includes/connect_db.php");

//include("functions/function.php");

?>


<form name="customer_login"  method="post" enctype="multipart/form-data">
<table align="center" style="width:500px;height:200px; margin-top:80px; border:3px groove #000033; ">
<tr>
<td style="background-color:#FFFFFF; color:black; border:2px solid black; font-size:20px; text-align:center;">
Login Or Register to Purchase</td>
</tr>
<tr>
<td align="center"  style="font-size:20px; color:#FFFFFF;"><b>Email Id:</b><input type="text" name="email" size="30"  placeholder="Enter Email"/></td>
</tr>
<tr>
<td align="center" style="font-size:20px; color:#FFFFFF;">
<b>Password:</b><input type="password" name="password" size="30"  placeholder="Enter Password"/>
</td>
</tr>
<tr>
<td align="center"  >
<input type="submit" name="login" value="Login" /><a href="check_out.php?forgot_pass" style="font-size:18px;">Forgot Password ?</a>
</td>
</tr>
<tr>
<td align="center" style="font-size:20px;"><a href="customer_register.php?forgot_pass" style="font-size:18px;">New? Registration Here</a></td>
</tr>
</table>



</form>


</body>
</html>

<?php 
if(isset($_POST['login']))

{
$email=$_POST['email'];
$pass=$_POST['password'];

$query="select * from customer where cust_email='$email' AND cust_pass='$pass'";

$run=mysql_query($query);
$login=mysql_num_rows($run);
if($login==0)
{
echo "Username or Password are incorrect";
exit();
}
$ip=getIp();
$select="select * from cart where ip_address='$ip'";
$sel_run=mysql_query($select);
$checkout=mysql_num_rows($sel_run);
if($login>0 AND $checkout==0)
 {
$_SESSION['cust_email']=$email;
echo "<script>alert('you are logged in successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";

}
else
{
$_SESSION['cust_email']=$email;
echo "<script>alert('you are logged in successfully')</script>";

echo "<script>window.open('check_out.php','_self')</script>";


}
 
}



?>