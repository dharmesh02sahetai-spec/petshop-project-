<?php
include'connection.php';
$id=$_GET['delid'];
$exe=$obj->query("delete from subcategory where sub_id='$id'");
if($exe)
{
	header('location:all_subcat.php');
}
else
{
	echo "something wrong";
}


?>