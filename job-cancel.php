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
	<script src="vendor/modernizr/modernizr.custom.js"></script>
	<script src="vendor/jquery/dist/jquery.js"></script>
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
</head>
<body>
	<?php include('_connection/_connect_mysqli.r'); ?>
	<?php include('func/functions.php'); ?>
	<?php include('nav-start.php'); ?>

<?php

	$srvsql			=	new	srvsql();
	$connect_srvsql	=	$srvsql->connect_srvsql();


	function get_comname($com_ID)
	{
		global $connect_srvsql;
		$sql	=	"
						SELECT	*
						FROM	[LeKise_Group].[dbo].[company]
						WHERE	[LeKise_Group].[dbo].[company].[company_ID] = '".$com_ID."'
						";
		$query	=	sqlsrv_query($connect_srvsql,$sql) or die( 'SQL Error = '.$sql.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
							
		$row	=	sqlsrv_fetch_array($query);
		return	$row['company_Name'];
	}

	function get_depname($com_ID,$dep_ID)
	{
		global $connect_srvsql;
		$sql	=	"
						SELECT		*
						FROM		[LeKise_Group].[dbo].[department]
						INNER JOIN	[LeKise_Group].[dbo].[company]		ON	[LeKise_Group].[dbo].[company].[company_Code]	=	[LeKise_Group].[dbo].[department].[company_Code]
						WHERE		[LeKise_Group].[dbo].[department].[department_Code]	=	'".$dep_ID."'
						AND			[LeKise_Group].[dbo].[company].[company_ID]			=	'".$com_ID."'
						";
		$query	=	sqlsrv_query($connect_srvsql,$sql) or die( 'SQL Error = '.$sql.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
		$row	=	sqlsrv_fetch_array($query);
		return	$row['department_Name'];
	}
?>




	<div class="card">
		<div class="card-header">
			<div class="card-title">
				All Jobs.
			</div>
		</div>
		<div class="card-body">
			<table class="table table-striped my-4 w-100" id="datatable1">
				<thead>
					<tr>
						<th width="6%">No</th>
						<th width="10%">Date</th>
						<th width="12%">Dep</th>
						<th width="14%">Name</th>
						<th width="23%">Type</th>
						<th width="30%">Detail</th>
						<th width="5%">Status</th>
					</tr>
				</thead>
				<tbody>
					<?
					$sql		=	"
									SELECT		*
									FROM		iservices
									WHERE		status_ID	=	3
									AND			u_ID		=	'".$_SESSION['u_ID']."'
									ORDER BY	service_ID	DESC
									";
					$query		=	mysqli_query($connect,$sql) or die(mysqli_error());
					while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
					{
						?>
						<tr>
							<td><?php echo $row['service_ID']; ?></td>
							<td><?php echo $row['service_Date_Start']; ?></td>
							<td>

								<?php 
								if($row['dep_ID']	==	999)
								{
									echo "Other";
								}
								else
								{
									echo get_depname($row['com_ID'],sprintf("%03d",$row['dep_ID']));
								}
								?>
							</td>
							<td><?php echo $row['service_Nameitem']; ?></td>
							<td><?php echo get_type($row['type_ID']) . ' - ' . get_subtype($row['subtype_ID']); ?></td>
							<td><?php echo $row['service_Detail']; ?></td>
							<td>
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#service<?php echo $row['service_ID']; ?>">
									<i class="fa fa-search"></i>
								</button>
							</td>
						</tr>
						<?
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

	<?php include('nav-end.php'); ?>

	<?php include('ajax/get_action.php'); ?>
	
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
	<script src="js/app.js"></script>
</body>
</html>