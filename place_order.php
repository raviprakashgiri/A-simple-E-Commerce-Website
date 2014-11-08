<form name="place" method="post" action="place_address.php" enctype="multipart/form-data">
<table border="1" width="500" align="center" style="margin-top:30px;">
 <tr style="font-size:20px;">
<th>Shipping Address</th>
</tr>

<tr>
<td>Full Name</td>
</tr>
<tr>
<td><input type="text"  name="f_name" size="50" placeholder="Please Enter Full Name "/></td>
</tr>

<tr>
<td>Address</td>
</tr>
<tr>
<td><input type="text" name="address" size="50" placeholder="Flat/House NO., Floor ,Building ................"></td>
</tr>

<tr>
<td>City</td>
</tr>
<tr>
<td><input type="text" name="city" size="50" placeholder="Please Enter City "></td>
</tr>

<tr>
<td>State</td>
</tr>
<tr>
<td><input type="text" name="state" size="50" placeholder="Please Enter State "></td>
</tr>
<tr>
<td>Country</td>
</tr>
<tr>
<td><input type="text" name="country" size="50" placeholder="Please Enter Country "></td>
</tr>

<tr>
<td>PinCode</td>
</tr>
<tr>
<td><input type="text"  name="pincode" size="50" placeholder="Please Enter Pincode "></td>
</tr>

<tr>
<td>Mobile</td>
</tr>
<tr>
<td><input type="text" name="mobile" size="50" placeholder="Please Enter Mobile "></td>
</tr>

<tr>
<td align="center"><input type="submit"  name="continue" value="Continue"></td>
</tr>

</table>

</form>
<?php

if(isset($_POST['continue']))

{
 $f_name=$_POST['f_name'];
 $address=$_POST['address'];
 $city=$_POST['city'];
 $state=$_POST['state'];
 $country=$_POST['country'];
 $pincode=$_POST['pincode'];
 $mobile=$_POST['mobile'];


 $ins="insert into shipping_address (shipping_id,f_name,address,city,state,country,pincode,mobile,date) values('','$f_name', '$address', '$city', '$state','$country','$pincode','$mobile', NOW())";

$run=mysql_query($ins);
if($run)
{
echo "data inserted successfyll";
}
}

 ?>



