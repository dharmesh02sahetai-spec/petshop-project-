<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

      $email=$_REQUEST["name"];
      $uid=$_REQUEST["email"];
      $mobile=$_REQUEST["mobile"];
      $message=$_REQUEST["message"];
      $con = new mysqli("localhost","root","","petshop");
	    $result= $con->query("insert into contact(name,email,mobile,message)values('$email','$uid','$mobile','$message')");
	    if($result)
	    {
	      $result= $con->query("select * from contact");    
          while($r= $result->fetch_object())
          {
            $row[]=$r;
          }
           echo json_encode($row);
	    }
?>