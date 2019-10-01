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


	<hr>

	<div class="card">
		<div class="card-header">
			<div class="card-title">
				Hardware Count
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped my-4 w-100" id="datatablehw">
				<thead>
					<tr>
						<th width="10%">บริษัท</th>
						<?
						$sql	=	"
									SELECT		*
									FROM		asset_subtype
									WHERE		asset_type_ID	=	'1'
									ORDER BY	asset_type_ID	ASC
									";
						$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
						while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
						{
							?>
							<th><?php echo $row['asset_subtype_Name']; ?></th>
							<?
						}
						?>
						<th width="10%">รวม</th>
					</tr>
				</thead>
				<tbody>
					<?
					$sql	=	"
								SELECT		*
								FROM		company
								ORDER BY	com_ID	ASC
								";
					$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
						while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
						{
							?>
							<tr>
								<td><?php echo get_com($row['com_ID']); ?></td>
								<?
								$sql2	=	"
											SELECT		*
											FROM		asset_subtype
											WHERE		asset_type_ID	=	'1'
											ORDER BY	asset_type_ID	ASC
											";
								$query2	=	mysqli_query($connect,$sql2) or die(mysqli_error());
								while($row2	=	mysqli_fetch_array($query2,MYSQLI_ASSOC))
								{
									?>
									<td><?php echo get_asset_count_rent($row['com_ID'],$row2['asset_type_ID'],$row2['asset_subtype_ID']); ?></td>
									<?
								}
								?>
								<td><?php echo get_asset_countall_rent($row['com_ID'],1); ?></td>
							</tr>
							<?
						}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th>รวม</th>
						<?
						$sql	=	"
									SELECT		*
									FROM		asset_subtype
									WHERE		asset_type_ID	=	'1'
									ORDER BY	asset_type_ID	ASC
									";
						$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
						while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
						{
							?>
							<th><?php echo get_asset_counttotal_rent($row['asset_type_ID'],$row['asset_subtype_ID']); ?></th>
							<?
						}
						?>
						<th width="10%"><?php echo get_asset_countalltotal_rent(1); ?></th>
					</tr>
				</tfoot>
			</table>
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
	<script type="text/javascript">
		$("#datatablehw").DataTable({
			"order": [[ 0, "asc" ]],
			"pageLength": 25
        });
</script>

</body>
</html>