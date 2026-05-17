<?php
header('Access-Control-Allow-Origin: *');

$con = new mysqli("localhost","root","","petshop");
$id=$_REQUEST['uid']; // <-- Added semicolon here
$result= $con->query("SELECT * FROM order_tbl where uid='$id'");    
if($result)
{
  while($r= $result->fetch_object())
  {
    $row[]=$r;
  }
   echo json_encode($row);
}
?>
