<?php
include'connection.php';
$feedback=$obj->query("SELECT paymenttbl.*, registration.* FROM paymenttbl INNER JOIN registration ON paymenttbl.u_id = registration.u_id");
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

	<title>Payment</title>

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

					<h1 class="h3 mb-3">All Payments</h1> 
				</div> 

						<div class="col-12 col-xl-12">

						</div>

						<div class="col-12 col-xl-12">
							<div class="card">
								
								<table class="table">
									<thead>
										<tr>
											<th style="width:20%">PayId</th>
											<th style="width:20%">Name</th>
											<th style="width:20%">OrderId</th>
											<th style="width:20%">Book For</th>
											<th style="width:20%">Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while($row=$feedback->fetch_object())
										{
											?>
											<tr>
												<td> <?php echo $row->pay_id; ?></td>
											    <td><?php echo $row->firstname." ".$row->lastname; ?></td>
												<td> <?php echo $row->book_id; ?></td>
												<td> <?php echo $row->preorder; ?></td>
												
												<td> <?php echo $row->amount; ?></td>
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