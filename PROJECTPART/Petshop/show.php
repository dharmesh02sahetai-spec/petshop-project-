<?php
header('Access-Control-Allow-Origin: *');
         $con = new mysqli("localhost","root","","petshop");
	      $result= $con->query("select * from product");    
          while($r= $result->fetch_object())
          {
            $row[]=$r;
          }
           echo json_encode($row);
?>