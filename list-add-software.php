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
		<form action="process/save_list-software.php" method="POST">
			<div class="card-header">
				<div class="card-title">
					Add Software.
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
								<label>Software</label>
								<select class="form-control" name="software">
									<option selected disabled>== Select ==</option>
									<option value="WinSvrCAL 2008 SNGL OLP NL DvcCAL">WinSvrCAL 2008 SNGL OLP NL DvcCAL</option>
									<option value="WinSvrStd 2008R2 SNGL OLP NL">WinSvrStd 2008R2 SNGL OLP NL</option>
									<option value="Windows XP">Windows XP</option>
									<option value="Windows 7 OEM">Windows 7 OEM</option>
									<option value="Windows 7 OPEN">Windows 7 OPEN</option>
									<option value="Windows 8 OEM">Windows 8 OEM</option>
									<option value="Windows 8 OPEN">Windows 8 OPEN</option>
									<option value="Windows 8.1 OEM">Windows 8.1 OEM</option>
									<option value="Windows 8.1 OPEN">Windows 8.1 OPEN</option>
									<option value="Windows 10 OEM">Windows 10 OEM</option>
									<option value="Windows 10 OPEN">Windows 10 OPEN</option>
									<option value="OfficeStd 2007 OEM">OfficeStd 2007 OEM</option>
									<option value="OfficeStd 2007 OPEN">OfficeStd 2007 OPEN</option>
									<option value="OfficeStd 2010 OEM">OfficeStd 2010 OEM</option>
									<option value="OfficeStd 2010 HOME">OfficeStd 2010 HOME</option>
									<option value="OfficeStd 2010 OPEN">OfficeStd 2010 OPEN</option>
									<option value="Officestd 2013 OEM">Officestd 2013 OEM</option>
									<option value="Officestd 2013 OPEN">Officestd 2013 OPEN</option>
									<option value="Officestd 2016 OEM">Officestd 2016 OEM</option>
									<option value="Officestd 2016 OPEN">Officestd 2016 OPEN</option>
									<option value="Microsoft Excel 2010 OPEN">Microsoft Excel 2010 OPEN</option>
									<option value="Windows Server 2003">Windows Server 2003</option>
									<option value="Windows Server 2008">Windows Server 2008</option>
									<option value="Windows Server 2008 R2">Windows Server 2008 R2</option>
									<option value="Windows Server 2012 R2">Windows Server 2012 R2</option>
									<option value="Windows Server 2016">Windows Server 2016</option>
									<option value="Windows Server 2016 R2">Windows Server 2016 R2</option>
									<option value="Microsoft SQL2008">Microsoft SQL2008</option>
									<option value="Microsoft SQL2014">Microsoft SQL2014</option>
									<option value="Microsoft SQL2016">Microsoft SQL2016</option>
									<option value="Autocad LT">Autocad LT</option>
									<option value="Autocad 3D">Autocad 3D</option>
									<option value="Adobe Photoshop Box">Adobe Photoshop Box</option>
									<option value="Adobe Illustrator Box">Adobe Illustrator Box</option>
									<option value="Adobe Photoshop CC">Adobe Photoshop CC</option>
									<option value="Adobe Illustrator CC">Adobe Illustrator CC</option>
									<option value="Adobe Premier Pro CC">Adobe Premier Pro CC</option>
									<option value="All adobe CC">All adobe CC</option>
									<option value="Solidwork">Solidwork</option>
									<option value="sysmantec endpoint protection">sysmantec endpoint protection</option>
									<option value="Veem Backup">Veem Backup</option>
									<option value="Microsoft Navision 2009">Microsoft Navision 2009</option>
								</select>
							</div>
							<div class="col-3">
								<label>Part Number</label>
								<input class="form-control" name="partnumber">
							</div>
							<div class="col-3">
								<label>PO Number</label>
								<input class="form-control" name="ponumber">
							</div>

						</div>
					</div>
					<div class="col-1">
						<label>Qty/License</label>
						<input class="form-control" name="qty">
					</div>
				</div>
				<div class="row rows">
					<div class="col-md-12 text-right">
						LKG-IT1-FM-001/REV.NO.01
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