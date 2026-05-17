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
									<h5 class="card-title">Horizontal form</h5>
									<h6 class="card-subtitle text-muted">Horizontal Bootstrap layout.</h6>
								</div>
								<div class="card-body">
									<form>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Email</label>
											<div class="col-sm-10">
												<input type="email" class="form-control" placeholder="Email">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Password</label>
											<div class="col-sm-10">
												<input type="password" class="form-control" placeholder="Password">
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">Textarea</label>
											<div class="col-sm-10">
												<textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
											</div>
										</div>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right">dropdown list</label>
											<div class="col-sm-10">
												<select class="form-control mb-3">
									          <option selected>Open this select menu</option>
									          <option>One</option>
									          <option>Two</option>
									          <option>Three</option>
									        </select>

									
											</div>
										</div>
							</div>
										<fieldset class="mb-3">
											<div class="row">
												<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">checkbox</label>
											<div class="col-sm-10">
												<div>
										<label class="form-check form-check-inline">
            								<input class="form-check-input" type="checkbox" name="inline-radios-example" value="option1">
           									 <span class="form-check-label">
              									1
           									 </span>
         								 </label>
										<label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="inline-radios-example" value="option2">
            <span class="form-check-label">
              2
            </span>
          </label>
										<label class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="inline-radios-example" value="option3" disabled>
            <span class="form-check-label">
              3
            </span>
          </label>
												</div>
											</div>
										</fieldset>
										<div class="mb-3 row">
											<label class="col-form-label col-sm-2 text-sm-right pt-sm-0">Radio</label>
											<div class="col-sm-10">
												<div>
										<label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inline-radios-example" value="option1">
            <span class="form-check-label">
              1
            </span>
          </label>
										<label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inline-radios-example" value="option2">
            <span class="form-check-label">
              2
            </span>
          </label>
										<label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="inline-radios-example" value="option3" disabled>
            <span class="form-check-label">
              3
            </span>
          </label>
									</div>
											</div>
										</div>
										<div class="mb-3 row">
											<div class="col-sm-10 ml-sm-auto">
												<button type="submit" class="btn btn-primary">Submit</button>
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