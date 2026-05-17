<?php

include 'connection.php';

$cid = $_GET["cid"];
$status = $_GET["status"];
$status = ($status=='active') ? "inactive" : "active" ;

$exe = $obj->query("update user set status='$status' where u_id='$cid'");

if($exe)
{
	echo "<script>alert('Status Updated Successfullly');document.location='customer.php';</script>";
}
else
{
	echo "<script>alert('Error in Status Update');</script>";
}



?>