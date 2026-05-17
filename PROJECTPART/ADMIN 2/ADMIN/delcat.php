<?php
include'connection.php';
$id=$_REQUEST['product_id'];
$exe=$obj->query("delete from product where product_id='$id'");
if($exe)
{
	header('location:all_cat.php');
}
else
{
	echo "something wrong";
}


?>