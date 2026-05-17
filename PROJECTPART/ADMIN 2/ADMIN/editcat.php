<?php
include'connection.php';

$cid=$_GET['product_id'];
$result=$obj->query("select * from product where product_id='$cid'");
$row=$result->fetch_object();
if(isset($_POST['submit']))
{
	$cname=$_POST['product_name'];
	$exe=$obj->query("update product set product_name='$cname' where product_id='$cid'");
	if($exe)
	{
		echo "<script>alert('category update succefully');</script>";
	}
	else
	{
		echo "<script>alert('something is wrong');</script>";
	}
}
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

			<div class="col-12 col-xl-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">update Categories</h5>
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-3 text-sm-right">Categories</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="product_name" name="product_name" placeholder="category" value="<?php echo $row->product_name; ?>">
				</div>
		</div>
</div>
	<div class="mb-3 row">
		<div class="col-sm-10 ml-sm-auto">
			<input type="submit" name="submit" value="Update" class="btn-primary">
		</div>
	</div>
	</form>
	</div>
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