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

	<h3>List Hardware </h3>
	<hr>
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
			<a href="list-companyhw.php?company=<?php echo $row['com_ID']; ?>" class="btn btn-outline-primary"><?php echo $row["com_T"]?></a>
			<?
		}
	?>
	
	<hr>
	<div class="card">
		<div class="card-header">
			<div class="card-title">
				Item
			</div>
		</div>
		<div class="card-body">
			<table class="table table-bordered table-striped my-4 w-100" id="datatable1">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="10%">บริษัท</th>
						<th width="10%">แผนก</th>
						<th width="10%">ประเภท</th>
						<th width="10%">รายกร</th>
						<th width="10%">Owner</th>
						<th width="10%">SN</th>
						<th width="25%">Detail</th>
						<th width="25%">Spec</th>
						<th width="5%">Waranty</th>
						<th width="5%">Lastupdate</th>
					</tr>
				</thead>
				<tbody>
					<?
					$sql	=	"
								SELECT		*
								FROM		asset
								WHERE		com_ID	=	'".$_GET['company']."'
								AND			asset_type_ID	=	'1'
								ORDER BY	com_ID	ASC
								";
					$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
					while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
					{
						$spec = explode(',',$row['asset_Detail5']);
						?>
						<tr>
							<td><?php echo $row['asset_ID']; ?></td>
							<td><?php echo get_com($row['com_ID']); ?></td>
							<td><?php echo get_dep($row['dep_ID']); ?></td>
							<td><?php echo get_asset_type($row['asset_type_ID']); ?></td>
							<td><?php echo get_asset_subtype($row['asset_subtype_ID']); ?></td>
							<td><?php echo $row['asset_Owner']; ?></td>
							<td><?php echo $row['asset_SN']; ?></td>
							<td><?php echo get_asset_detail($row['asset_ID']); ?></td>
							<td>
							<?php if($row['asset_Detail5']!=''){ ?>
								<ul>
							<?php foreach ($spec as $key => $value) { ?>
								<li><?php echo $value ?></li>
							<?php } ?>
								</ul>
							<?php } ?>
							</td>
							<td><?php echo $row['asset_waranty']; ?></td>
							<td><?php echo $row['lastupdate']; ?></td>
						</tr>
						<?
					}
					?>
				</tbody>
			</table>
		</div>
		<div class="card-footer text-right">
			LKG-IT1-FM-005/REV.NO.01
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