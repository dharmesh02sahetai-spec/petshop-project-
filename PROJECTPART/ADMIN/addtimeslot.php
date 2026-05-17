<?php
session_start();
include'connection.php';
if(isset($_POST['submit']))
{
	
	$file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $path = "upload/$file";
    
    $upload_url = 'https://testmadhuramelectronicsnow.000webhostapp.com/MADHURAM/'.$path;

    $exe = explode(".", $file);
    $e = strtolower(end($exe));

    	if(move_uploaded_file($tmp, $path))
    	{
    		$exe=$obj->query("insert into sliderimage(sliderimage)
			values('$upload_url')");
				if($exe)
				{
					echo "<script>alert('New Images Uploaded Successfully');</script>";
				}
				else
				{
					echo "<script>alert('something is wrong');</script>";
					///echo "Failed : " . mysqli_error($obj);
				}
    	}
    	else
    	{
    		echo "<script>alert('Error in File Uploading..');</script>";
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

	<title>Foodyghar</title>

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

					<h1 class="alert alert-info h2 p-3">Add Slider Image</h1> 
			<div class="col-12 col-xl-12">
				<div class="card">
						
					<div class="card-header">
						</div>
<div class="card-body">
	<form method="post" enctype="multipart/form-data">


<div class="row mb-4">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Product Image</label>
		<div class="col-sm-7">
			<input type="file" class="form-control" id="file" name="file" accept="image/png,image/gif,image/jpeg required="">
		</div>
</div>



	<div class="mb-3 row">
		<div class="col-sm-10 ml-sm-auto">
			<input type="submit" name="submit" value="Submit" class="btn-primary"  style = "width:30%;margin-left: 120px;padding: 5px;font-weight: bold;">
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
