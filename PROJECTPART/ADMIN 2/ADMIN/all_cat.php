<?php
session_start();
include'connection.php';
$result = $obj->query('select * from  category');
$studio = $obj->query('select * from  studio_register');
if(isset($_POST['submit']))
{
	$horizontalitemtext=$_POST['horizontalitemtext'];
	$horizonatlitemrating=$_POST['horizonatlitemrating'];
	$horizontalitemprice=$_POST['horizontalitemprice'];
	$horizontalitemcancelprice=$_POST['horizontalitemcancelprice'];
	$horizontallabel=$_POST['horizontallabel'];
	$horizontalitemdetails=$_POST['horizontalitemdetails'];
	$layout=$_POST['layout'];
	$itemoffer=$_POST['itemoffer'];
	
	$applianceid=$_POST['catid'];
	
	$file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    $path = "upload/$file";
    
    $upload_url = 'https://testmadhuramelectronicsnow.000webhostapp.com/MADHURAM/'.$path;

    $exe = explode(".", $file);
    $e = strtolower(end($exe));

    	if(move_uploaded_file($tmp, $path))
    	{
    		$exe=$obj->query("insert into horizontalitem(horizontalitemtext,horizonatlitemrating,horizontalitemprice,horizontalitemcancelprice,horizontallabel,horizontalitemdetails,layout,itemoffer,applianceid,horizontalitemimage)
			values('$horizontalitemtext','$horizonatlitemrating','$horizontalitemprice','$horizontalitemcancelprice','$horizontallabel','$horizontalitemdetails','$layout','$itemoffer','$applianceid','$upload_url')");
			
				if($exe)
				{
					echo "<script>alert('New Product Detail Uploaded Successfully');</script>";
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

	<title>MADHURAM ELECTRONICS</title>

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

					<h1 class="alert alert-info h2 p-3">Add Product Detail</h1> 
			<div class="col-12 col-xl-12">
				<div class="card">
						
					<div class="card-header">
						</div>
<div class="card-body">
	<form method="post" enctype="multipart/form-data">
	<div class="mb-1 row">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Categories</label>
		<div class="col-sm-7">
			<select class="form-control mb-3" id="catid" name="catid" required=""> 
		          <option>-- Select Category --</option>
		          <?php
		          while($row=$result->fetch_object())
		          {
		          ?>
		          <option value="<?php echo $row->catid?>"> <?php echo $row->catname; ?></option>
		          <?php
		      		}
		      		?>
		          
        	</select>
        </div>
</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Enter Horizontal Item Text</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="foodname" name="horizontalitemtext" placeholder="Enter Horizontal Item Text" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+{100}" title="Title Must be Valid">
				</div>
		</div>	
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Horizonatl Item Rating</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="foodprice" name="horizonatlitemrating" placeholder="Horizonatl Item Rating" required="" 
                            pattern="[0-9]+" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Horizontal Item Price</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="layout" 
					name="layout" placeholder="Horizontal Item Price" required="" 
                            pattern="[0-9]+" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Horizontal Item Cancel Price</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="resfoodtable" name="horizontalitemcancelprice" placeholder="Horizontal Item Cancel Price" required="" 
                            pattern="[0-9]+" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Horizontal Label</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="resfoodtable" name="horizontallabel" placeholder="Horizontal Item Cancel Price" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+{100}" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Horizontal Item Details</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="resfoodtable" name="horizontalitemdetails" placeholder="Horizontal Item Details" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+{100}" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Layout</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="resfoodtable" name="layout" placeholder="Layout" required="" 
                            pattern="[0-9]+" title="Title Must be Valid">
				</div>
		</div>
		<div class="mb-1 row">
			<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Item Offer</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" id="resfoodtable" name="itemoffer" placeholder="Item Offer" required="" 
                            pattern="[a-zA-Z]+[a-zA-Z ]+{50}" title="Title Must be Valid">
				</div>
		</div>
</div>


<div class="row mb-4">
	<label class="col-form-label col-sm-3 text-sm-right font-weight-bold">Food Image</label>
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
