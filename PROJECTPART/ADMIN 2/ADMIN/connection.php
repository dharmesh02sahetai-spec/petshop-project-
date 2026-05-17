<?php
error_reporting(0);
session_start();
$obj = new mysqli("localhost","root","","petshop");
$errno=$obj->connect_errno;
if($errno != 0)
{
	echo $obj->connect_error;
	exit;
}
?>