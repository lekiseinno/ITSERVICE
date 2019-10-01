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
	<link rel="stylesheet" href="css/bootstrap.css" id="bscss">
	<link rel="stylesheet" href="css/app.css" id="maincss">
	<link rel="stylesheet" href="css/addon.css">

	<script src="vendor/jquery/dist/jquery.js"></script>
</head>

<body>
	
	<?php include('_connection/_connect_mysqli.r'); ?>
	<?php include('nav-start.php'); ?>
	
	<form action="process/save_addjob.php" method="POST">

		<div class="card card-panel">
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<label>บริษัท : </label>
						<select class="form-control" name="com">
							<option selected disabled>== Select ==</option>
							<?
								$sql	=	"
											SELECT	*
											FROM	company
											";
								$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
								while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
								{
									?>
									<option value="<?php echo $row['com_ID']; ?>"><?php echo $row["com_Name"]?></option>
									<?
								}
							?>
						</select>
					</div>
				</div>
				<div class="row rows">
					<div class="col-md-6">
						<label>ชื่อ : </label>
						<input class="form-control" type="" name="name">
					</div>
					<div class="col-md-6">
						<label>แผนก  : </label>
						<select class="form-control" name="dep">
							<option selected disabled>== Select ==</option>
							<?
								$sql	=	"
											SELECT	*
											FROM	department
											";
								$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
								while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
								{
									?>
									<option value="<?php echo $row['dep_ID']; ?>"><?php echo $row["dep_Name"]?></option>
									<?
								}
							?>
						</select>
					</div>
				</div>
				<div class="row rows">
					<div class="col-md-6">
						<label>ประเภท : </label>
						<select class="form-control" id="Type" name="type">
							<option selected disabled>== Select ==</option>
							<?
								$sql	=	"
											SELECT	*
											FROM	type
											";
								$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
								while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
								{
									?>
									<option value="<?php echo $row['type_ID']; ?>"><?php echo $row["type_Detail"]?></option>
									<?
								}
							?>
						</select>
						<script type="text/javascript">
							$(document).ready(function(){
								$("#Type").change(function(){
									$.get("ajax/get_Subtype.php?type=" + $("#Type").val() , function( data ) {
										$("#Subtype").html( data );
									});
								});
							});
						</script>
					</div>
					<div class="col-md-6">
						<label>รายการ  : </label>
						<select class="form-control" id="Subtype" name="subtype">
							<option selected disabled>== Select ==</option>
						</select>
					</div>
				</div>
				<div class="row rows">
					<div class="col-md-12">
						<label>Detail : </label>
						<textarea class="form-control" rows="5" name="detail"></textarea>
					</div>
				</div>
				<div class="row rows">
					<div class="col-md-12 text-center">
						<button type="submit" class="btn btn-primary btn-lg" style="width: 50%;">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col text-right">
			LKG-IT1-FM-006/REV.NO.01
		</div>
	</div>
		

	<?php include('nav-end.php'); ?>
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