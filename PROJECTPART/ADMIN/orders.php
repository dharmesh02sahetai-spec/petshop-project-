<?php
include'connection.php';
$feedback=$obj->query("SELECT ordertable.*, usertable.name,usertable.contact, usertable.email ,horizontalitem.horizontalitemtext FROM ordertable
INNER JOIN usertable ON usertable.id=ordertable.id
INNER JOIN horizontalitem ON horizontalitem.horizontalitemid = ordertable.productid  
ORDER BY `usertable`.`name` ASC");
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>MyOrders</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<!-- sidebar start -->
		<?php
		include'common/sidebar.php';
		?>
		<!-- sidebar finish -->

		<div class="main">
			
       <!-- header start -->
			<?php
			include'common/header.php';
			?>
		<!-- header finish -->

			<main class="content">
				 <div class="container-fluid p-0">

					<h1 class="h3 mb-3">All Orders</h1> 
				</div> 

						<div class="col-12 col-xl-12">

						</div>

						<div class="col-12 col-xl-12">
							<div class="card">
								
								<table class="table">
									<thead>
										<tr>
											<th style="width:10%">Order Id</th>
											<th style="width:20%">Product Name</th>
											<th style="width:25%">Customer Name</th>
											<th style="width:15%">Contact</th>
											<th style="width:15%">Email</th>
											<th style="width:15%">Payment Detail</th>											
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=$feedback->fetch_object())
										{
											?>
											<tr>
												<td> <?php echo $row->orderid; ?></td>
											    <td><?php echo $row->horizontalitemtext;?></td>
												<td> <?php echo $row->name; ?></td>
												<td> <?php echo $row->contact; ?></td>
												<td> <?php echo $row->email; ?></td>
												<td> <?php echo $row->cashoronline; ?></td>
												
										</tr>
										<?php

										 }

										 ?>
										
										
										
										
									</tbody>
								</table>
							</div>
						</div>

						<div class="col-12">
							<div class="card">
								
							</div> 
						</div>
					</div>

				</div>
			</main>

			<!-- footer start-->
		<?php include'common/footer.php';?>
		<!--footer finish-->
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>