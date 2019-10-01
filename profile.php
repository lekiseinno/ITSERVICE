
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
	<link rel="stylesheet" href="vendor/animate.css/animate.css">
	<link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
	<link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">

	<link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="vendor/datatables.net-keytable-bs/css/keyTable.bootstrap.css">
	<link rel="stylesheet" href="vendor/datatables.net-responsive-bs/css/responsive.bootstrap.css">


	<link rel="stylesheet" href="css/bootstrap.css" id="bscss">
	<link rel="stylesheet" href="css/app.css" id="maincss">
	<link rel="stylesheet" href="css/addon.css">

	<script src="vendor/jquery/dist/jquery.js"></script>

</head>

<body>
	
	<?php include('_connection/_connect_mysqli.r'); ?>
	<?php include('func/functions.php'); ?>
	<?php include('nav-start.php'); ?>

<div style="margin: -20px;">
	<div style="background-image: url(img/profile-bg.jpg); background-size: cover;">
		<div class="p-4 text-center text-white">
			<br><br><br><br><br>
			<img class="img-thumbnail rounded-circle thumb128" src="img/user/<?php echo $_SESSION['user_Photo']; ?>" alt="Image">
			<h3 class="m-0"><?php echo $_SESSION['user_Fname']?></h3>
			<p>
				<?php
				$sql	=	"
							SELECT	*
							FROM	section
							WHERE	sec_ID	=	'".$_SESSION[u_sec]."'
							";
				$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
				$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
				echo $row[sec_Name];
				?>
			</p>
			<p>Proin metus justo, commodo in ultrices at, lobortis sit amet dui. Fusce dolor purus, adipiscing a tempus at, gravida vel purus.</p>
			<br><br><br><br><br>
		</div>
	</div>
</div>
	





		

	<?php include('nav-end.php'); ?>

	





	<script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
	<script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
	<script src="vendor/datatables.net-buttons/js/dataTables.buttons.js"></script>
	<script src="vendor/datatables.net-buttons-bs/js/buttons.bootstrap.js"></script>
	<script src="vendor/datatables.net-buttons/js/buttons.colVis.js"></script>
	<script src="vendor/datatables.net-buttons/js/buttons.flash.js"></script>
	<script src="vendor/datatables.net-buttons/js/buttons.html5.js"></script>
	<script src="vendor/datatables.net-buttons/js/buttons.print.js"></script>
	<script src="vendor/datatables.net-keytable/js/dataTables.keyTable.js"></script>
	<script src="vendor/datatables.net-responsive/js/dataTables.responsive.js"></script>
	<script src="vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>

	


	<script src="vendor/modernizr/modernizr.custom.js"></script>
	<script src="vendor/popper.js/dist/umd/popper.js"></script>
	<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
	<script src="vendor/js-storage/js.storage.js"></script>
	<script src="vendor/jquery.easing/jquery.easing.js"></script>
	<script src="vendor/animo/animo.js"></script>		
	<script src="vendor/screenfull/dist/screenfull.js"></script>
	<script src="vendor/jquery-localize/dist/jquery.localize.js"></script>
	<script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="vendor/flot/jquery.flot.js"></script>
	<script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
	<script src="vendor/flot/jquery.flot.resize.js"></script>
	<script src="vendor/flot/jquery.flot.pie.js"></script>
	<script src="vendor/flot/jquery.flot.time.js"></script>
	<script src="vendor/flot/jquery.flot.categories.js"></script>
	<script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
	<script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
	<script src="vendor/moment/min/moment-with-locales.js"></script>




	<script src="js/app.js"></script>

</body>
</html>