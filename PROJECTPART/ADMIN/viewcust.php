<?php
include'connection.php';
session_start();
$id=$_GET['cid'];
$customer=$obj->query("select * from user where u_id='$id'");
/*$idea=$obj->query("select i.id,i.title,i.smdesc,i.lddesc,i.cat_id,i.sub_id,i.file,i.duration,i.price,i.date,i.status,
c.cat_id,c.cat_name,
s.sub_id,s.sub_name 
from idea as i inner join subcategory as s on  i.sub_id=s.sub_id
inner JOIN category as c on i.cat_id=c.cat_id
where i.in_id='$id'");*/
$row=$customer->fetch_object();
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

	<title>Form Layouts | AdminKit Demo</title>

	<link href="css/app.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper">
		<!--sidebar start-->
		<?php include'common/sidebar.php';?>
		<!--sidebar end-->

		<div class="main">
			<!-- header start -->
			<?php
			include'common/header.php';
			?>
		<!-- header finish -->
			<main class="content">
				
						<div class="col-12 col-xl-12">
							<div class="card">
								
								<div class="card-body">
									<h4 style="color: blue;" class="alert alert-info">Customer Detail</h4>
									<br>
									<form>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left"><b><h5>Name</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->u_fname." ".$row->u_lname; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left"><b><h5>Gender</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->gen; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left"><b><h5>Date Of Birth</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->dob; ?>
											</div>
										</div>
										<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><b><h5>Email</b></h5></label>
												<div class="col-sm-7">
													<?php echo $row->email; ?>
												</div>
											</div>
										</fieldset>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><b><h5>Contact</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->contact; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><b><h5>Address</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->address; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><b><h5>City</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->city; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><b><h5>state</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->state; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><h5><b>Degree</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->degree; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"> <h5><b>Work Experiance</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->work_exp." Yrs"; ?>
											</div>
										</div>
										
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><h5><b>Image</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->image; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><h5><b>password</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->password; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><h5><b>Registartion Date</b></h5></label>
											<div class="col-sm-7">
												<?php echo $row->reg_date; ?>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-3 text-sm-left pt-sm-0"><h5><b>Status</b></h5></label>
											<div class="col-sm-7">

												<?php echo $row->status; ?> &nbsp;<a href="change_status.php?cid=<?php echo $row->u_id; ?>&status=<?php echo $row->status; ?>" style="color:blue">Change Status</a>
											</div>
										</div>
										
									</form>
								</div>
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