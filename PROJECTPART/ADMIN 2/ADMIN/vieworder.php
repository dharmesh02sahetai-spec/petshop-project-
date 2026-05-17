<?php

include 'connection.php';
$order_sel = $obj->query("SELECT o.ord_id, o.ord_date, o.u_id, o.i_id, o.status, u.u_fname, u.u_lname, u.u_id, id.id, id.title,id.smdesc,id.price, inn.inno_id, inn.fname, inn.lname
from myorder as o INNER JOIN user as u ON o.u_id = u.u_id
INNER JOIN idea as id ON o.i_id=id.id
INNER JOIN innovator as inn ON id.in_id=inn.inno_id ");


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

	<title>Tables | AdminKit Demo</title>

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

					<h1 class="h3 mb-3">Order</h1> 
				</div> 

						<div class="col-12 col-xl-8">

						</div>

						<div class="col-12 col-xl-8">
							<div class="card">
								
								<table class="table">
									<thead>
										<tr>
											<th>Serial</th>
		                                    <th>Name</th>
		                                    <th>Idea Name</th>
		                                    <th>Small Description</th>
		                                    <th>Innovatar Name</th>
		                                    <th>Price</th>
		                                    <th>Order Date</th>
		                                    <th>Status</th>

											
										</tr>
									</thead>
									<tbody>
										 <?php
										while($row=$order_sel->fetch_object())
										{
											?>
											<tr>
												<td><?php echo $row->ord_id; ?></td>
			                                    <td><?php echo $row->u_fname. " ". $row->u_lname; ?></td>
			                                    <td><?php echo $row->title; ?></td>
			                                    <td><?php echo $row->smdesc; ?></td>
			                                    <td><?php echo $row->fname. " ". $row->lname; ?></td>
			                                    <td><?php echo $row->price; ?></td>
			                                    <td><?php echo $row->ord_date; ?></td>
			                                    <td><?php echo $row->status; ?></td>
										</tr>
										 <?php

										 }

										 ?>
										 
										
										
										<!--<tr class="table-primary">
											<td>William Harris</td>
											<td>914-939-2458</td>
											<td class="d-none d-md-table-cell">May 15, 1948</td>
											<td class="table-action">
												<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
												<a href="#"><i class="align-middle" data-feather="trash"></i></a>
											</td>
										</tr>
										<tr>
											<td>Sharon Lessman</td>
											<td>704-993-5435</td>
											<td class="d-none d-md-table-cell">September 14, 1965</td>
											<td class="table-action">
												<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
												<a href="#"><i class="align-middle" data-feather="trash"></i></a>
											</td>
										</tr>
										<tr class="table-success">
											<td>Christina Mason</td>
											<td>765-382-8195</td>
											<td class="d-none d-md-table-cell">April 2, 1971</td>
											<td class="table-action">
												<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
												<a href="#"><i class="align-middle" data-feather="trash"></i></a>
											</td>
										</tr>
										<tr>
											<td>Robin Schneiders</td>
											<td>202-672-1407</td>
											<td class="d-none d-md-table-cell">October 12, 1966</td>
											<td class="table-action">
												<a href="#"><i class="align-middle" data-feather="edit-2"></i></a>
												<a href="#"><i class="align-middle" data-feather="trash"></i></a>
											</td>
										</tr>-->
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