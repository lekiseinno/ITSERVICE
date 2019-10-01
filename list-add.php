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

	
	<!-- <a href="list.php" class="btn btn-outline-primary"><i class="fa fa-list-ol"></i> List</a> -->

	
	<hr>
	<div class="card">
		<form action="process/save_list.php" method="POST">
			<div class="card-header">
				<div class="card-title">
					Add List.
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-11">
						<div class="row">


							<div class="col-3">
								<label>Company</label>
								<select class="form-control" name="company">
									<option selected disabled>== Select ==</option>
									<?
										$sql	=	"
													SELECT	*
													FROM	company
													ORDER BY com_ID ASC
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
							<div class="col-3">
								<label>Department</label>
								<select class="form-control" name="department">
									<option selected disabled>== Select ==</option>
									<?
										$sql	=	"
													SELECT	*
													FROM	department
													ORDER BY dep_ID ASC
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
							<div class="col-3">
								<label>Type</label>
								<select class="form-control" id="Type" name="type">
									<option selected disabled>== Select ==</option>
									<?
										$sql	=	"
													SELECT	*
													FROM	asset_type
													ORDER BY asset_type_Name ASC
													";
										$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
										while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
										{
											?>
											<option value="<?php echo $row['asset_type_ID']; ?>"><?php echo $row["asset_type_Name"]?></option>
											<?
										}
									?>
								</select>
								<script type="text/javascript">
									$(document).ready(function(){
										$("#Type").change(function(){
											$.get("ajax/get_assetSubtype.php?type=" + $("#Type").val() , function( data ) {
												$("#Subtype").html( data );
											});
										});
									});
								</script>
							</div>
							<div class="col-3">
								<label>Sub Type</label>
								<select class="form-control" id="Subtype" name="subtype">
									<option selected disabled>== Select Type First ==</option>
								</select>
							</div>

						</div>
					</div>
					<div class="col-1">
						<label>For rent</label>
						<select class="form-control" id="Subtype" name="rent">
							<option selected value="0" >== None ==</option>
							<option  value="1">Yes</option>
						</select>
					</div>
				</div>
				<div class="row rows">
					<div class="col-3">
						<div class="row rows">
							<div class="col-12">
								<label>Owner</label>
								<input class="form-control" name="owner">
							</div>
						</div>
						<div class="row rows">
							<div class="col-8">
								<label>S/N</label>
								<input class="form-control" name="sn">
							</div>
							<div class="col-4">
								<label>Waranty</label>
								<input class="form-control" name="waranty">
							</div>
						</div>
					</div>
					<div class="col-9">
						<div class="row rows">
							<div class="col-3">
								<label>Modal</label>
								<textarea class="form-control" name="detail1" rows="4"></textarea>
							</div>
							<div class="col-3">
								<label>Computer Name </label>
								<textarea class="form-control" name="detail2" rows="4"></textarea>
							</div>
							<div class="col-3">
								<label>OS</label>
								<textarea class="form-control" name="detail3" rows="4"></textarea>
							</div>
							<div class="col-3">
								<label>Software</label>
								<textarea class="form-control" name="detail4" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>
				
				

			</div>
			<div class="card-footer text-right">
				<button class="btn btn-lg btn-outline-primary"> <i class="fa fa-save"></i> Save </button>
			</div>	
		</form>

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