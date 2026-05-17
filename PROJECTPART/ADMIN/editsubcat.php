<?php
include'connection.php';
$category=$obj->query('select * from category');
$sid=$_GET['edid'];
$subcategory=$obj->query("select * from subcategory where sub_id='$sid'");
$subcat=$subcategory->fetch_object();
$cid=$subcat->c_id;


if(isset($_POST['submit']))
{
	$sub_name=$_POST['sub_name'];
	$cat_id=$_POST['cat_id'];
	$exe=$obj->query("update subcategory set sub_name='$sub_name',c_id='$cat_id' where sub_id='$sid'");
	if($exe)
	{
		header('location:all_subcat.php');
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

			<div class="col-12 col-xl-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Add Categories</h5>
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-3 row">
			<label class="col-form-label col-sm-4 text-sm-right">Subcategories</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="sub_name" name="sub_name" value="<?php echo $subcat->sub_name; ?>"  placeholder="category">
				</div>
		</div>
</div>
<div class="mb-3 row">
	<label class="col-form-label col-sm-4 text-sm-right">Categories</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="cat_id" name="cat_id">
		          <option>-- Select Categories --</option>
		          <?php
		          while($row=$category->fetch_object())
		          {
		          	?>
		          <option value="<?php echo $row->cat_id; ?>" <?php if($cid==$row->cat_id) echo "selected";?> > <?php echo $row->cat_name; ?> </option>
		          <?php
		      		}
		      		?>
		          
        	</select>
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