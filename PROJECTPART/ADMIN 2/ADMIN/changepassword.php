<?php
include'connection.php';
session_start();
$id= $_SESSION['ad_id'];
if(isset($_POST['submit']))
{
	
	$result=$obj->query("select * from admin where id='$id'");
	$row=$result->fetch_object();
	$oldpass=$row->password;
	$old=$_POST['old'];
	$new=$_POST['new'];
	$cnew=$_POST['cpass'];
	if($oldpass==$old)
	{
		if($new==$cnew)
		{
			$exe=$obj->query("update admin set password='$new' where id='$id'");
			if($exe)
			{
				echo "<script>alert('Your password is succefully change');</script>";
			}
			else
			{
				echo "<script>alert('something is wrong');</script>";
			}
		}
		else
		{
			echo "<script>alert('something is wrong');</script>";
		}


	}
	else
	{
		echo "<script>alert('Missmatch password')</script>";
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
<h1 class="alert alert-info h2 p-3">Change Password</h1>
			<div class="col-12 col-xl-12">
				<div class="card">
					<div class="card-header">
						
						</div>
<div class="card-body">
	<form method="post">
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right">Old Password</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="old" name="old">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right">New Password</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="new" name="new">
				</div>
		</div>
</div>
<div class="card-body">
	<form method="post">
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right">Confirm Password</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="cpass" name="cpass">
				</div>
		</div>
</div>
	<div class="mb-5 mt-2 row">
		<div class="col-sm-9 ml-sm-auto">
			<input type="submit" name="submit" value="Update Password" class="btn-primary">
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