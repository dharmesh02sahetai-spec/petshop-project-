<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

      $email=$_REQUEST["pid"];
      $order_id=$_REQUEST["order_id"];
      $uid=$_REQUEST["uid"];
      $totalitem=$_REQUEST["totalitem"];
      $amount=$_REQUEST["amount"];
      
      $con = new mysqli("localhost","root","","petshop");
	    $result= $con->query("insert into order_tbl(pid,order_id,uid,totalitem,amount)
      values('$email','$order_id','$uid','$totalitem','$amount')");
	    if($result)
	    {
	      $result= $con->query("select * from order_tbl");    
          while($r= $result->fetch_object())
          {
            $row[]=$r;
          }
           echo json_encode($row);
	    }
?>