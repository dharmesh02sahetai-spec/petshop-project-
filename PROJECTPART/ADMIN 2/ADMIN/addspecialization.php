<?php
include'connection.php';
$category=$obj->query('select * from mechanic');
if(isset($_POST['submit']))
{
	$specialization_category=$_POST['specialization_category'];
	$mid=$_POST['mechanic_id'];
	$exe=$obj->query("insert into Specialization(specialization_category,mechanic_id)values('$specialization_category','$mid')");
	if($exe)
	{
		echo "<script>alert('Specialization added');</script>";
	}
	else
	{
		echo "<script>alert('something wrong');</script>";
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

			<div class="col-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Add Specialization Detail</h5>
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-2 row">
			<label class="col-form-label col-sm-4 text-sm-right">Enter Specialization Category</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="specialization_category" name="specialization_category" placeholder="Enter service_type" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+" title="SubCat Must be Valid">
				</div>
		</div>
</div>
<div class="mb-2 row">
	<label class="col-form-label col-sm-4 text-sm-right">Categories</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="mechanic_id" name="mechanic_id" required=""> 
		          <option>-- Select Mechanic --</option>
		          <?php
		          while($row=$category->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row->mechanic_id?>"> <?php echo $row->mechanic_name; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>
	<div class="mb-3 row">
		<div class="col-sm-8 ml-sm-auto">
			<input type="submit" name="submit" value="Add Subcategory" class="btn-primary">
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