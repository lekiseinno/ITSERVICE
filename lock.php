<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Bootstrap Admin App + jQuery">
	<meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
	<title>IT Service</title>
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css" id="bscss">
	<link rel="stylesheet" href="css/app.css" id="maincss">
</head>
<body>
	<?php include('_connection/_connect_mysqli.r'); ?>
	<?php session_start(); ?>
	<div class="wrapper">
		<div class="abs-center wd-xl">
			<div class="d-flex justify-content-center">
				<div class="p-2">
					<img class="img-fluid img-thumbnail rounded-circle" src="img/user/02.jpg" alt="Avatar" width="60" height="60">
				</div>
			</div>
			<div class="card b0">
				<div class="card-body">
					<p class="text-center">Please login to unlock your screen.</p>
					<form action="" method="POST">
						<div class="form-group">
							<div class="input-group with-focus">
								<input class="form-control border-right-0" type="password" placeholder="Enter password" autocomplete="off" required>
								<div class="input-group-append">
									<span class="input-group-text fa fa-lock text-muted bg-transparent border-left-0"></span>
								</div>
							</div>
						</div>
						<div class="d-flex">
							<div class="mt-1">
								<a class="text-muted" href="#">
									<small>Forgot your password?</small>
								</a>
							</div>
							<div class="ml-auto">
								<a class="btn btn-sm btn-primary" href="dashboard.html">Unlock</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="p-3 text-center">
				<span class="mr-2">&copy;</span>
				<span>2018</span>
				<span class="mr-2">-</span>
				<span>Innovation<b>s</b></span>
				<br>
				<span>IT Services - LeKise Service Center</span>
			</div>
		</div>
	</div>
	<script src="vendor/modernizr/modernizr.custom.js"></script>
	<script src="vendor/jquery/dist/jquery.js"></script>
	<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
	<script src="vendor/js-storage/js.storage.js"></script>
	<script src="vendor/parsleyjs/dist/parsley.js"></script>
	<script src="js/app.js"></script>
</body>
</html>