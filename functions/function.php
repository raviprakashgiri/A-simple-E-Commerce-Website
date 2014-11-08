
<?php 

mysql_connect("localhost","root","") or die (mysql_error());

mysql_select_db("ecommerce_website") or die (mysql_error());

function getcat(){                                               //function for left content categories display

$gets_cat="select *from  categories";

$run_cat=mysql_query($gets_cat);

while($row_cat=mysql_fetch_array($run_cat))
{
$cat_id=$row_cat['cat_id'];
$cat_name=$row_cat['cat_name'];
echo "<li><a href='index.php?cat=$cat_id'>$cat_name</a></li>";
}
}




function getbrand()                          //function for left content brand display
{

$gets_brand="select *from  brand";

$run_brand=mysql_query($gets_brand);

while($row_brand=mysql_fetch_array($run_brand))
{
$brand_id=$row_brand['brand_id'];
$brand_name=$row_brand['brand_name'];
echo "<li><a href='index.php?brand=$brand_id'>$brand_name</a></li>";


}


}


function getProduct()                  //function for right content  product  display
{
if(!isset($_GET['cat']))
{

if(!isset($_GET['brand']))
{

$get="select * from products order by rand() LIMIT 0,12 ";
$get1=mysql_query($get);

while($get_product=mysql_fetch_array($get1))
{
$pro_id=$get_product['product_id'];


$pro_cat=$get_product['cat_id'];
$pro_brand=$get_product['brand_id'];
$pro_title=$get_product['product_title'];
$pro_img1=$get_product['img1'];
$pro_price=$get_product['product_price'];
$pro_details=$get_product['product_desc'];
$pro_keyword=$get_product['keyword'];
$pro_status=$get_product['status'];

echo "<div class='product'>
<div class='title'>
$pro_title
</div>

<div class='box'>
<div class='image'>
<a href='details.php'><img src='admin_area/photo/$pro_img1' width='170' height='160'></a>
</div>

<div class='box1'>
<div class='price_content'>
<div class='details'>
<a href='details.php?pro_id=$pro_id'>Details</a>
</div>
<div class='price'>
Rs:$pro_price
</div>

</div>
<div class='add_to_cart' align='center'>
<a href='index.php?add_cart=$pro_id'><button name='add_to_cart'>Add To Cart</button></a>
</div>

</div>


</div>
</div>";
}

}


}
}




function get_all_Product()                  //function for right content    display  All Product
{
if(!isset($_GET['cat']))
{

if(!isset($_GET['brand']))
{
$disp_pro=4;                                                //start  coding for pagination
$disp="select COUNT('product_id') from products ";
$get_disp=mysql_query($disp);
$disp_result=ceil(mysql_result($get_disp,0)/$disp_pro);     //ceil function use to making whole number if any fraction
$t=(isset($_GET['no']))?$_GET['no']:1;
$start= ($t -1)*$disp_pro;




$get="select * from products LIMIT $start,$disp_pro";
$get1=mysql_query($get);

while($get_product=mysql_fetch_array($get1))
{
$pro_id=$get_product['product_id'];


$pro_cat=$get_product['cat_id'];
$pro_brand=$get_product['brand_id'];
$pro_title=$get_product['product_title'];
$pro_img1=$get_product['img1'];
$pro_price=$get_product['product_price'];
$pro_details=$get_product['product_desc'];
$pro_keyword=$get_product['keyword'];
$pro_status=$get_product['status'];

echo "<div class='product'>
<div class='title'>
$pro_title
</div>

<div class='box'>
<div class='image'>
<a href='details.php'><img src='admin_area/photo/$pro_img1' width='170' height='160'></a>
</div>

<div class='box1'>
<div class='price_content'>
<div class='details'>
<a href='details.php?pro_id=$pro_id'>Details</a>

</div>
<div class='price'>
Rs:$pro_price
</div>

</div>
<div class='add_to_cart' align='center'>
<a href='index.php?add_cart=$pro_id'><button name='add_to_cart'>Add To Cart</button></a>
</div>

</div>


</div>
</div>";
}




}


}
}         

function pagination()                   // function to using for loop for display page no;

{

$disp_pro=4;                                                //start  coding for pagination
$disp="select COUNT('product_id') from products ";
$get_disp=mysql_query($disp);
$disp_result=ceil(mysql_result($get_disp,0)/$disp_pro);     //ceil function use to making whole number if any fraction
$t=(isset($_GET['no']))?$_GET['no']:1;
$start= ($t -1)*$disp_pro;

$prev=$t-1;
$next=$t+1;
if(!($t<=1))
{
echo "<a href='all_product.php?no=$prev' style='font-size:21px; color:white;'>Prev</a>"." ";
}
if($disp_result>=1 && $t<= $disp_result)
{
for($p=1; $p<$disp_pro; $p++)
{

echo ($t==$p)?'<b><a href="?no='.$p.'" style="color:red; font-size:21px;">'.$p.'  '.'  '.'</a></b>':'<a href="?no='.$p.'" style="text-decoration:none; font-size:21px; color:white;">'.$p.'  '.'  '.'</a>';


}
if(!($t>=$disp_result))
{
echo "<a href='all_product.php?no=$next' style='font-size:21px; color:white;'>Next</a>"." ";
}
}
}



function get_cat_display()                  //function for right content  product  display by categories
{
if(isset($_GET['cat']))
{
$cats_id=$_GET['cat'];
$get_product="select * from products where cat_id='$cats_id' ";
$gets_prodect=mysql_query($get_product);

$count=mysql_num_rows($gets_prodect);
if($count==0)
{

echo "<h2>No Products found in this categories........!</h2>";

}

while($get_product_cat=mysql_fetch_array($gets_prodect))
{
$pro_id=$get_product_cat['product_id'];


$pro_cat=$get_product_cat['cat_id'];
$pro_brand=$get_product_cat['brand_id'];
$pro_title=$get_product_cat['product_title'];
$pro_img1=$get_product_cat['img1'];
$pro_price=$get_product_cat['product_price'];
$pro_details=$get_product_cat['product_desc'];
$pro_keyword=$get_product_cat['keyword'];
$pro_status=$get_product_cat['status'];

echo "<div class='product'>
<div class='title'>
$pro_title
</div>

<div class='box'>
<div class='image'>
<a href='details.php'><img src='admin_area/photo/$pro_img1' width='170' height='160'></a>
</div>

<div class='box1'>
<div class='price_content'>
<div class='details'>
<a href='details.php?pro_id=$pro_id'>Details</a>
</div>
<div class='price'>
Rs:$pro_price
</div>

</div>
<div class='add_to_cart' align='center'>
<a href='index.php?add_cart=$pro_id'><button name='add_to_cart'>Add To Cart</button></a>
</div>

</div>


</div>
</div>";
}

}


}





function get_brand_display()                  //function for right content  product  display by brand
{
if(isset($_GET['brand']))
{
$brand_id=$_GET['brand'];
$get_brand="select * from products where cat_id='$brand_id' ";
$gets_brand=mysql_query($get_brand);
$count_brand=mysql_num_rows($gets_brand);


if($count_brand==0)
{
echo "<h2>No Products found in this Brand.............!<>";

}

while($get_product_brand=mysql_fetch_array($gets_brand))
{
$pro_id=$get_product_brand['product_id'];


$pro_cat=$get_product_brand['cat_id'];
$pro_brand=$get_product_brand['brand_id'];
$pro_title=$get_product_brand['product_title'];
$pro_img1=$get_product_brand['img1'];
$pro_price=$get_product_brand['product_price'];
$pro_details=$get_product_brand['product_desc'];
$pro_keyword=$get_product_brand['keyword'];
$pro_status=$get_product_brand['status'];

echo "<div class='product'>
<div class='title'>
$pro_title
</div>

<div class='box'>
<div class='image'>
<a href='details.php'><img src='admin_area/photo/$pro_img1' width='170' height='160'></a>
</div>

<div class='box1'>
<div class='price_content'>
<div class='details'>
<a href='details.php?pro_id=$pro_id'>Details</a>
</div>
<div class='price'>
Rs:$pro_price
</div>

</div>
<div class='add_to_cart' align='center'>
<a href='index.php?add_cart=$pro_id'><button name='add_to_cart'>Add To Cart</button></a>
</div>

</div>


</div>
</div>";
}

}


}




function search_product()                  //function for     display  search Product
{
if(!isset($_GET['cat']))
{

if(!isset($_GET['brand']))
{
if(isset($_GET['submit']))
{
$search_product=$_GET['search'];

$get_search="select * from products where keyword like '%$search_product%'";
$gets_search=mysql_query($get_search);
$count_search=mysql_num_rows($gets_search);


if($count_search==0)
{
echo "<h2>Products are Not found.............!<>";

}
while($get_product_search=mysql_fetch_array($gets_search))
{
$pro_id=$get_product_search['product_id'];


$pro_cat=$get_product_search['cat_id'];
$pro_brand=$get_product_search['brand_id'];
$pro_title=$get_product_search['product_title'];
$pro_img1=$get_product_search['img1'];
$pro_price=$get_product_search['product_price'];
$pro_details=$get_product_search['product_desc'];
$pro_keyword=$get_product_search['keyword'];
$pro_status=$get_product_search['status'];

echo "<div class='product'>
<div class='title'>
$pro_title
</div>

<div class='box'>
<div class='image'>
<a href='details.php'><img src='admin_area/photo/$pro_img1' width='170' height='160'></a>
</div>

<div class='box1'>
<div class='price_content'>
<div class='details'>
<a href='details.php?pro_id=$pro_id'>Details</a>
</div>
<div class='price'>
Rs:$pro_price
</div>

</div>
<div class='add_to_cart' align='center'>
<a href='index.php?add_cart=$pro_id'><button name='add_to_cart'>Add To Cart</button></a>
</div>

</div>


</div>
</div>";
}

}


}
}         

}




function getIp() {                        //function for track ip address of users
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

 function customer_id()
 {
 $cust="select * from customer";
 $cust_run=mysql_query($cust);
 while($row=mysql_fetch_array($cust_run))
 {
 $cust_id=$row['cus_id'];
 // $cust_name=$row['cust_user_name'];

 }
 
 }
 
 customer_id();


function cart()                     //function for cart table
{
if(isset($_GET['add_cart']))
{
  $pro_id=$_GET['add_cart'];
  $cust_id= customer_id();

  $ip=getIp();
  
  $check_cart="select * from cart where ip_address='$ip' AND p_id='$pro_id'";
  $pro_cart_query=mysql_query($check_cart);
  if(mysql_num_rows($pro_cart_query)>0)
  
  {
  echo "";
  }
  else
  {
  
  $insert_cart="insert into cart (p_id,ip_address) values ('$pro_id','$ip')";
  
  $insert_cart1=mysql_query($insert_cart);
  
  
  if($insert_cart1)
  {
  echo  "<script>window.open('index.php','_self')</script>";
  
  }
  }
  
  }

}



 //function for display total product by users
 
 
 
function total_items()
{
if(isset($_GET['add_cart']))
{
$ip=getIp();

$total_items="select * from cart where  ip_address='$ip'";
$total_run=mysql_query($total_items);

$total_item_count=mysql_num_rows($total_run);


}

else
{
$ip=getIp();
$total_items="select * from cart where  ip_address='$ip'";
$total_run=mysql_query($total_items);

$total_item_count=mysql_num_rows($total_run);


}
echo $total_item_count;

}



//functio for total price
function total_price()
{

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
$pro_price=array($p_price['product_price']);

$total_price=array_sum($pro_price);

$total+=$total_price;
}


}
echo $total;

}


?>


