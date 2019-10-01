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



	<script src="js/highcharts.js"></script>
	<script src="js/exporting.js"></script>




	<style type="text/css">
		#chart1 {
			min-width: 310px;
			max-width: 800px;
			height: 330px;
			margin: 0 auto
		}
	</style>





</head>

<body>
	
	<?php include('_connection/_connect_mysqli.r'); ?>
	<?php include('nav-start.php'); ?>



	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #B2E3FF; ">
					<div class="card-title">
						สรุปงานประจำเดือน
					</div>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-striped my-4 w-100">
						<thead>
							<tr>
								<th width="25%">แผนก</th>
								<th width="25%">สรุปงานทั้งปี</th>
								<th width="25%">เดือนก่อนหน้า</th>
								<th width="25%">เดือนปัจจุบัน</th>
							</tr>
						</thead>
						<tbody>
							<?
							$sql	=	"
										SELECT		*
										FROM		section
										ORDER BY	sec_Name	ASC
										";
							$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
							while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
							{
								?>
								<tr>
									<td><?php echo $row['sec_Name']; ?></td>
									<td><?php echo countsec_Y($row['sec_ID']); ?></td>
									<td><?php echo countsec_delM($row['sec_ID']); ?></td>
									<td><?php echo countsec_thisM($row['sec_ID']); ?></td>
								</tr>
								<?
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #B2E3FF;">
					<div class="card-title">
						สรุปงานประจำเดือน
					</div>
				</div>
				<div class="card-body">
					<div id="chartall"></div>
					<script type="text/javascript">
						Highcharts.chart('chartall', {
							chart: {
								type: 'line'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
							},
							yAxis: {
								title: {
									text: ''
								}
							},
							plotOptions: {
								line: {
									dataLabels: {
										enabled: true
									},
									enableMouseTracking: true
								}
							},
							series: [
							<?
								$sql	=	"SELECT * FROM section";
								$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
								while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
								{ 
									?>
									{
										name: '<?=$row[sec_Name]?>',
										<?
										$h = 2;
										for($i=1;$i<=12;$i++)
										{
											$sqlc		=	"
															SELECT COUNT(*) as 'cou'
															FROM iservices
															WHERE service_Date_Start LIKE '".date('Y')."-".sprintf("%0".$h."d",$i)."%'
															AND sec_ID		= 	'".$row[sec_ID]."'
															AND	status_ID	=	'4'
															";
											$queryc		=	mysqli_query($connect,$sqlc) or die(mysqli_error());
											$rowc[$i]	=	mysqli_fetch_array($queryc,MYSQLI_ASSOC);
										}
										?>
										data:[<?=$rowc[1][cou];?>,<?=$rowc[2][cou];?>,<?=$rowc[3][cou];?>,<?=$rowc[4][cou];?>,<?=$rowc[5][cou];?>,<?=$rowc[6][cou];?>,<?=$rowc[7][cou];?>,<?=$rowc[8][cou];?>,<?=$rowc[9][cou];?>,<?=$rowc[10][cou];?>,<?=$rowc[11][cou];?>,<?=$rowc[12][cou];?>]
									},
									<?
								}
							?>
							]
						});
					</script>
				</div>
			</div>
		</div>
	</div>
	<hr id="chart3_m">
	<div class="row rows">
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #C4FFF4;">
					<div class="card-title">
						<div class="row">
							<div class="col-md-9 col-xs-9 col-sm-9">
								สรุปงานรายบริษัทประจำเดือน : 
								<b>
								<?
								if($_GET['chart3_m'] != "")
								{
									$t 	=	substr($_GET['chart3_m'], 5,2);
									switch($t)
										{
											case 1:		$tt = "Jan";	break;
											case 2:		$tt = "Feb";	break;
											case 3:		$tt = "Mar";	break;
											case 4:		$tt = "Api";	break;
											case 5:		$tt = "May";	break;
											case 6:		$tt = "Jun";	break;
											case 7:		$tt = "Jul";	break;
											case 8:		$tt = "Aug";	break;
											case 9:		$tt = "Sep";	break;
											case 10:	$tt = "Oct";	break;
											case 11:	$tt = "Nov";	break;
											case 12:	$tt = "Dec";	break;
										}
									echo $tt;
								}
								else
								{
									echo date('M');
								}
								?>
								</b>
							</div>
							<div class="col-md-3 col-xs-3 col-sm-3 text-right">
								<select class="form-control" id="selectchart3">
									<option value="<?=date('M')?>" disabled selected><?=date('M')?></option>
									<option disabled>==========</option>
									<?
									$h = 2;
									for($i=1;$i<=12;$i++)
									{
										switch($i)
										{
											case 1:		$ii = "Jan";	break;
											case 2:		$ii = "Feb";	break;
											case 3:		$ii = "Mar";	break;
											case 4:		$ii = "Api";	break;
											case 5:		$ii = "May";	break;
											case 6:		$ii = "Jun";	break;
											case 7:		$ii = "Jul";	break;
											case 8:		$ii = "Aug";	break;
											case 9:		$ii = "Sep";	break;
											case 10:	$ii = "Oct";	break;
											case 11:	$ii = "Nov";	break;
											case 12:	$ii = "Dec";	break;
										}
										?>
										<option value="<? echo date('Y')."-".sprintf("%0".$h."d",$i);?>"><?=$ii?></option>
										<?
									}
									?>
								</select>
								<script type="text/javascript">
									$("#selectchart3").change(function(){
										window.location.href='report-all.php?chart3_m='+ $("#selectchart3").val() +'#chart3_m';
									})
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="chart3" ></div>
					<script type="text/javascript">
						<?
						if($_GET['chart3_m'] != "")
						{
							?>
							Highcharts.chart('chart3', {
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},
								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},
								series: [{
									name: 'Company',
									colorByPoint: true,
									data: [
										<?php
										$sql_com				=	"
																	SELECT * 
																	FROM company
																	";
										$query_com 				=	mysqli_query($connect,$sql_com);
										while($row_com			=	mysqli_fetch_array($query_com))
										{
											$sql_countcomM		=	"
																	SELECT COUNT(*) as 'cc'
																	FROM iservices
																	WHERE com_ID			=		'".$row_com[com_ID]."'
																	AND	status_ID			=		'4'
																	AND service_Date_Start	LIKE	'".$_GET['chart3_m']."%'
																	";
											$query_countcomM	=	mysqli_query($connect,$sql_countcomM);
											$row_countcomM		=	mysqli_fetch_array($query_countcomM);
											$chart3[] 			=	"
																	{
																		name:'".$row_com['com_T']."',
																		y:".$row_countcomM['cc']."
																	}
																	";
										}
										echo implode(",", $chart3);
										?>
									]
								}]
							});
							<?
						}
						else
						{
							?>
							Highcharts.chart('chart3', {
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},
								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},
								series: [{
									name: 'Company',
									colorByPoint: true,
									data: [
										<?php
										$sql_com				=	"
																	SELECT * 
																	FROM company
																	";
										$query_com 				=	mysqli_query($connect,$sql_com);
										while($row_com			=	mysqli_fetch_array($query_com))
										{
											$sql_countcomM		=	"
																	SELECT COUNT(*) as 'cc'
																	FROM iservices
																	WHERE com_ID			=		'".$row_com[com_ID]."'
																	AND	status_ID			=		'4'
																	AND service_Date_Start	LIKE	'".date('Y-m')."%'
																	";
																	//echo $sql_countcomM;
											$query_countcomM	=	mysqli_query($connect,$sql_countcomM);
											$row_countcomM		=	mysqli_fetch_array($query_countcomM);
											$chart3[] 			=	"
																	{
																		name:'".$row_com['com_T']."',
																		y:".$row_countcomM['cc']."
																	}
																	";
										}
										echo implode(",", $chart3);
										?>
									]
								}]
							});
							<?
						}
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #C4FFF4;">
					<div class="card-title">
						สรุปงานรายบริษัทประจำปี
					</div>
				</div>
				<div class="card-body">
					<div id="chart4"></div>
					<script type="text/javascript">
						Highcharts.chart('chart4', {
							chart: {
								type: 'column'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								type: 'category'
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y}'
									}
								}
							},
							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
							},
							series: [{
								name: 'Company',
								colorByPoint: true,
								data: [
									<?php
									$sql_com				=	"
																SELECT * 
																FROM company
																";
									$query_com 				=	mysqli_query($connect,$sql_com);
									while($row_com			=	mysqli_fetch_array($query_com))
									{
										$sql_countcomM		=	"
																SELECT COUNT(*) as 'cc'
																FROM iservices
																WHERE com_ID			=		'".$row_com[com_ID]."'
																AND	status_ID			=		'4'
																AND service_Date_Start	LIKE	'".date('Y-')."%'
																";
										$query_countcomM	=	mysqli_query($connect,$sql_countcomM);
										$row_countcomM		=	mysqli_fetch_array($query_countcomM);
										$chart4[] 			=	"
																{
																	name: '".$row_com['com_T']."',
																	y: ".$row_countcomM['cc']."
																}
																";
									}
									echo implode(",", $chart4);
									?>
								]
							}]
						});
					</script>
				</div>
			</div>
		</div>
	</div>


















	<hr id="chart5_m">
	<div class="row rows">
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFF1C4;">
					<div class="card-title">
						<div class="row">
							<div class="col-md-9 col-xs-9 col-sm-9">
								สรุปงานรายแผนกประจำเดือน : 
								<b>
								<?
								if($_GET['chart5_m'] != "")
								{
									$t 	=	substr($_GET['chart5_m'], 5,2);
									switch($t)
										{
											case 1:		$tt = "Jan";	break;
											case 2:		$tt = "Feb";	break;
											case 3:		$tt = "Mar";	break;
											case 4:		$tt = "Api";	break;
											case 5:		$tt = "May";	break;
											case 6:		$tt = "Jun";	break;
											case 7:		$tt = "Jul";	break;
											case 8:		$tt = "Aug";	break;
											case 9:		$tt = "Sep";	break;
											case 10:	$tt = "Oct";	break;
											case 11:	$tt = "Nov";	break;
											case 12:	$tt = "Dec";	break;
										}
									echo $tt;
								}
								else
								{
									echo date('M');
								}
								?>
								</b>
							</div>
							<div class="col-md-3 col-xs-3 col-sm-3 text-right">
								<select class="form-control" id="selectchart5">
									<option value="<?=date('M')?>" disabled selected><?=date('M')?></option>
									<option disabled>==========</option>
									<?
									$h = 2;
									for($i=1;$i<=12;$i++)
									{
										switch($i)
										{
											case 1:		$ii = "Jan";	break;
											case 2:		$ii = "Feb";	break;
											case 3:		$ii = "Mar";	break;
											case 4:		$ii = "Api";	break;
											case 5:		$ii = "May";	break;
											case 6:		$ii = "Jun";	break;
											case 7:		$ii = "Jul";	break;
											case 8:		$ii = "Aug";	break;
											case 9:		$ii = "Sep";	break;
											case 10:	$ii = "Oct";	break;
											case 11:	$ii = "Nov";	break;
											case 12:	$ii = "Dec";	break;
										}
										?>
										<option value="<? echo date('Y')."-".sprintf("%0".$h."d",$i);?>"><?=$ii?></option>
										<?
									}
									?>
								</select>
								<script type="text/javascript">
									$("#selectchart5").change(function(){
										window.location.href='report-all.php?chart5_m='+ $("#selectchart5").val() +'#chart5_m';
									})
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="chart5"></div>
					<script type="text/javascript">
						<?
						if($_GET['chart5_m'] != "")
						{
							?>
							
							$('#chart5').highcharts({
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {
									title: {
										text: ' '
									}
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},

								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},

								series: [{
									name: 'Department',
									colorByPoint: true,
									data: [
										<?
										$sql_get_dep_m			=	"
																	SELECT * 
																	FROM department
																	";
										$query_get_dep_m 		=	mysqli_query($connect,$sql_get_dep_m);
										while($row_get_dep_m	=	mysqli_fetch_array($query_get_dep_m))
										{
											$sql_count_depM_m	=	"
																	SELECT COUNT(*) as 'cc'
																	FROM iservices
																	WHERE dep_ID = '".$row_get_dep_m[dep_ID]."'
																	AND	status_ID = '4'
																	AND service_Date_Start LIKE '".$_GET['chart5_m']."%'
																	";
											$query_count_depM_m	=	mysqli_query($connect,$sql_count_depM_m);
											$row_count_depM_m	=	mysqli_fetch_array($query_count_depM_m);
											$datadepm[] 		=	"
																	{
																		name: '".$row_get_dep_m['dep_Name']."',
																		y: ".$row_count_depM_m['cc']."
																	}
																	";
										}
										echo implode(",", $datadepm);
										?>
									]
								}]
							});
							<?
						}
						else
						{
							?>
							$('#chart5').highcharts({
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {
									title: {
										text: ' '
									}
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},

								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},

								series: [{
									name: 'Department',
									colorByPoint: true,
									data: [
										<?
										$sql_get_dep_m			=	"
																	SELECT * 
																	FROM department
																	";
										$query_get_dep_m 		=	mysqli_query($connect,$sql_get_dep_m);
										while($row_get_dep_m	=	mysqli_fetch_array($query_get_dep_m))
										{
											$sql_count_depM_m	=	"
																	SELECT COUNT(*) as 'cc'
																	FROM iservices
																	WHERE dep_ID = '".$row_get_dep_m[dep_ID]."'
																	AND	status_ID = '4'
																	AND service_Date_Start LIKE '".date('Y-m')."%'
																	";
											$query_count_depM_m	=	mysqli_query($connect,$sql_count_depM_m);
											$row_count_depM_m	=	mysqli_fetch_array($query_count_depM_m);
											$datadepm[] 		=	"
																	{
																		name: '".$row_get_dep_m['dep_Name']."',
																		y: ".$row_count_depM_m['cc']."
																	}
																	";
										}
										echo implode(",", $datadepm);
										?>
									]
								}]
							});
							<?
						}
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFF1C4;">
					<div class="card-title">
						สรุปงานรายแผนกประจำปี
					</div>
				</div>
				<div class="card-body">
					<div id="chart6"></div>
					<script type="text/javascript">
						$('#chart6').highcharts({
							chart: {
								type: 'column'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								type: 'category'
							},
							yAxis: {
								title: {
									text: ' '
								}
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y}'
									}
								}
							},

							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
							},

							series: [{
								name: 'Department',
								colorByPoint: true,
								data: [
									<?
									$sql_get_dep_m			=	"
																SELECT * 
																FROM department
																";
									$query_get_dep_m 		=	mysqli_query($connect,$sql_get_dep_m);
									while($row_get_dep_m	=	mysqli_fetch_array($query_get_dep_m))
									{
										$sql_count_depM_m	=	"
																SELECT COUNT(*) as 'cc'
																FROM iservices
																WHERE dep_ID = '".$row_get_dep_m[dep_ID]."'
																AND	status_ID = '4'
																AND service_Date_Start LIKE '".date('Y')."%'
																";
										$query_count_depM_m	=	mysqli_query($connect,$sql_count_depM_m);
										$row_count_depM_m	=	mysqli_fetch_array($query_count_depM_m);
										$chart6[] 		=	"
																{
																	name: '".$row_get_dep_m['dep_Name']."',
																	y: ".$row_count_depM_m['cc']."
																}
																";
									}
									echo implode(",", $chart6);
									?>
								]
							}]
						});
					</script>
				</div>
			</div>
		</div>
	</div>


	<hr id="chart7_m">
	<div class="row rows">
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFD5BD;">
					<div class="card-title">
						<div class="row">
							<div class="col-md-9 col-xs-9 col-sm-9">
								สรุปปัญหาประจำเดือน : 
								<b>
								<?
								if($_GET['chart7_m'] != "")
								{
									$t 	=	substr($_GET['chart7_m'], 5,2);
									switch($t)
										{
											case 1:		$tt = "Jan";	break;
											case 2:		$tt = "Feb";	break;
											case 3:		$tt = "Mar";	break;
											case 4:		$tt = "Api";	break;
											case 5:		$tt = "May";	break;
											case 6:		$tt = "Jun";	break;
											case 7:		$tt = "Jul";	break;
											case 8:		$tt = "Aug";	break;
											case 9:		$tt = "Sep";	break;
											case 10:	$tt = "Oct";	break;
											case 11:	$tt = "Nov";	break;
											case 12:	$tt = "Dec";	break;
										}
									echo $tt;
								}
								else
								{
									echo date('M');
								}
								?>
								</b>
							</div>
							<div class="col-md-3 col-xs-3 col-sm-3 text-right">
								<select class="form-control" id="selectchart7">
									<option value="<?=date('M')?>" disabled selected><?=date('M')?></option>
									<option disabled>==========</option>
									<?
									$h = 2;
									for($i=1;$i<=12;$i++)
									{
										switch($i)
										{
											case 1:		$ii = "Jan";	break;
											case 2:		$ii = "Feb";	break;
											case 3:		$ii = "Mar";	break;
											case 4:		$ii = "Api";	break;
											case 5:		$ii = "May";	break;
											case 6:		$ii = "Jun";	break;
											case 7:		$ii = "Jul";	break;
											case 8:		$ii = "Aug";	break;
											case 9:		$ii = "Sep";	break;
											case 10:	$ii = "Oct";	break;
											case 11:	$ii = "Nov";	break;
											case 12:	$ii = "Dec";	break;
										}
										?>
										<option value="<? echo date('Y')."-".sprintf("%0".$h."d",$i);?>"><?=$ii?></option>
										<?
									}
									?>
								</select>
								<script type="text/javascript">
									$("#selectchart7").change(function(){
										window.location.href='report-all.php?chart7_m='+ $("#selectchart7").val() +'#chart7_m';
									})
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="chart7"></div>
					<script type="text/javascript">
						
						<?
						if($_GET['chart7_m'] != "")
						{
							?>
							$('#chart7').highcharts({
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {
									title: {
										text: ' '
									}
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},
								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},

								series: [{
									name: 'Problem',
									colorByPoint: true,
									data: [
										<?
										$sql_get_type_m			=	"
																	SELECT * 
																	FROM type
																	";
										$query_get_type_m 		=	mysqli_query($connect,$sql_get_type_m);
										while($row_get_type_m	=	mysqli_fetch_array($query_get_type_m))
										{
											$sql_count_type_m	=	"
																	SELECT COUNT(*) as 'stypes'
																	FROM iservices
																	WHERE type_ID = '".$row_get_type_m[type_ID]."'
																	AND	status_ID = '4'
																	AND service_Date_Start LIKE '".$_GET['chart7_m']."%'
																	";
											$query_count_type_m	=	mysqli_query($connect,$sql_count_type_m);
											$row_count_type_m	=	mysqli_fetch_array($query_count_type_m);
											$datatypem[] 	=	"
															{
																name: '".$row_get_type_m['type_Detail']."',
																y: ".$row_count_type_m['stypes']."
															}
															";
										}
										echo implode(",", $datatypem);
										?>

									]
								}]
							});
							<?
						}
						else
						{
							?>
							$('#chart7').highcharts({
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {
									title: {
										text: ' '
									}
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},
								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},

								series: [{
									name: 'Problem',
									colorByPoint: true,
									data: [
										<?
										$sql_get_type_m			=	"
																	SELECT * 
																	FROM type
																	";
										$query_get_type_m 		=	mysqli_query($connect,$sql_get_type_m);
										while($row_get_type_m	=	mysqli_fetch_array($query_get_type_m))
										{
											$sql_count_type_m	=	"
																	SELECT COUNT(*) as 'stypes'
																	FROM iservices
																	WHERE type_ID = '".$row_get_type_m[type_ID]."'
																	AND	status_ID = '4'
																	AND service_Date_Start LIKE '".date('Y-m')."%'
																	";
											$query_count_type_m	=	mysqli_query($connect,$sql_count_type_m);
											$row_count_type_m	=	mysqli_fetch_array($query_count_type_m);
											$datatypem[] 	=	"
															{
																name: '".$row_get_type_m['type_Detail']."',
																y: ".$row_count_type_m['stypes']."
															}
															";
										}
										echo implode(",", $datatypem);
										?>

									]
								}]
							});
							<?
						}
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFD5BD;">
					<div class="card-title">
						สรุปปัญหาประจำปี
					</div>
				</div>
				<div class="card-body">
					<div id="chart8"></div>
					<script type="text/javascript">
						$('#chart8').highcharts({
							chart: {
								type: 'column'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								type: 'category'
							},
							yAxis: {
								title: {
									text: ' '
								}
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y}'
									}
								}
							},

							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
							},

							series: [{
								name: 'Problem',
								colorByPoint: true,
								data: [
									<?
									$sql_get_type_m			=	"
																SELECT * 
																FROM type
																";
									$query_get_type_m 		=	mysqli_query($connect,$sql_get_type_m);
									while($row_get_type_m	=	mysqli_fetch_array($query_get_type_m))
									{
										$sql_count_type_m	=	"
																SELECT COUNT(*) as 'stypes'
																FROM iservices
																WHERE type_ID = '".$row_get_type_m[type_ID]."'
																AND	status_ID = '4'
																AND service_Date_Start LIKE '".date('Y')."%'
																";
										$query_count_type_m	=	mysqli_query($connect,$sql_count_type_m);
										$row_count_type_m	=	mysqli_fetch_array($query_count_type_m);
										$chart8[] 	=	"
														{
															name: '".$row_get_type_m['type_Detail']."',
															y: ".$row_count_type_m['stypes']."
														}
														";
									}
									echo implode(",", $chart8);
									?>
								]
							}]
						});
					</script>
				</div>
			</div>
		</div>
	</div>


	<hr id="chart9_m">
	<div class="row rows">
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFAEA3;">
					<div class="card-title">
						<div class="row">
							<div class="col-md-9 col-xs-9 col-sm-9">
								สรุปรายชื่อผู้ปฎิบัติงานประจำเดือน : 
								<b>
								<?
								if($_GET['chart9_m'] != "")
								{
									$t 	=	substr($_GET['chart9_m'], 5,2);
									switch($t)
										{
											case 1:		$tt = "Jan";	break;
											case 2:		$tt = "Feb";	break;
											case 3:		$tt = "Mar";	break;
											case 4:		$tt = "Api";	break;
											case 5:		$tt = "May";	break;
											case 6:		$tt = "Jun";	break;
											case 7:		$tt = "Jul";	break;
											case 8:		$tt = "Aug";	break;
											case 9:		$tt = "Sep";	break;
											case 10:	$tt = "Oct";	break;
											case 11:	$tt = "Nov";	break;
											case 12:	$tt = "Dec";	break;
										}
									echo $tt;
								}
								else
								{
									echo date('M');
								}
								?>
								</b>
							</div>
							<div class="col-md-3 col-xs-3 col-sm-3 text-right">
								<select class="form-control" id="selectchart9">
									<option value="<?=date('M')?>" disabled selected><?=date('M')?></option>
									<option disabled>==========</option>
									<?
									$h = 2;
									for($i=1;$i<=12;$i++)
									{
										switch($i)
										{
											case 1:		$ii = "Jan";	break;
											case 2:		$ii = "Feb";	break;
											case 3:		$ii = "Mar";	break;
											case 4:		$ii = "Api";	break;
											case 5:		$ii = "May";	break;
											case 6:		$ii = "Jun";	break;
											case 7:		$ii = "Jul";	break;
											case 8:		$ii = "Aug";	break;
											case 9:		$ii = "Sep";	break;
											case 10:	$ii = "Oct";	break;
											case 11:	$ii = "Nov";	break;
											case 12:	$ii = "Dec";	break;
										}
										?>
										<option value="<? echo date('Y')."-".sprintf("%0".$h."d",$i);?>"><?=$ii?></option>
										<?
									}
									?>
								</select>
								<script type="text/javascript">
									$("#selectchart9").change(function(){
										window.location.href='report-all.php?chart9_m='+ $("#selectchart9").val() +'#chart9_m';
									})
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="chart9"></div>
					<script type="text/javascript">
						<?
						if($_GET['chart9_m'] != "")
						{
							?>
							$('#chart9').highcharts({
							chart: {
								type: 'column'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								type: 'category'
							},
							yAxis: {
								title: {
									text: ' '
								}
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y}'
									}
								}
							},
							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
							},
							series: [{
								name: 'User',
								colorByPoint: true,
								data: [
									<?
									$sql_get_u_m			=	"
																SELECT	* 
																FROM	user
																WHERE	(user_Username != 'admin' and user_Username != 'apichart.lks')
																AND		user_Status	=	1
																";
									$query_get_u_m 			=	mysqli_query($connect,$sql_get_u_m);
									while($row_get_u_m		=	mysqli_fetch_array($query_get_u_m))
									{
										$sql_count_u_m 		=	"
															SELECT		COUNT(*) as 'stypes'
															FROM		iservices
															INNER JOIN	iservices_detail ON iservices_detail.service_ID = iservices.service_ID
															WHERE		iservices_detail.u_ID = '".$row_get_u_m[u_ID]."'
															AND			iservices.status_ID = '4'
															AND			iservices.service_Date_Start LIKE '".$_GET['chart9_m']."%'
															";
										$query_count_u_m	=	mysqli_query($connect,$sql_count_u_m);
										$row_count_u_m		=	mysqli_fetch_array($query_count_u_m);
										$dataum[] 	=	"
														{
															name: '".$row_get_u_m['user_Fname']."',
															y: ".$row_count_u_m['stypes']."
														}
														";
									}
									echo implode(",", $dataum);
									?>
								]
							}]
						});
							<?
						}
						else
						{
							?>
							$('#chart9').highcharts({
								chart: {
									type: 'column'
								},
								exporting: { 
									enabled: false 
								},
								title: {
									text: ''
								},
								subtitle: {
									text: ''
								},
								xAxis: {
									type: 'category'
								},
								yAxis: {
									title: {
										text: ' '
									}
								},
								legend: {
									enabled: false
								},
								plotOptions: {
									series: {
										borderWidth: 0,
										dataLabels: {
											enabled: true,
											format: '{point.y}'
										}
									}
								},
								tooltip: {
									headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
									pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								},
								series: [{
									name: 'User',
									colorByPoint: true,
									data: [
										<?
										$sql_get_u_m			=	"
																	SELECT	* 
																	FROM	user
																	WHERE	(user_Username != 'admin' and user_Username != 'apichart.lks')
																	AND		user_Status	=	1
																	";
										$query_get_u_m 			=	mysqli_query($connect,$sql_get_u_m);
										while($row_get_u_m		=	mysqli_fetch_array($query_get_u_m))
										{
											$sql_count_u_m 		=	"
																	SELECT		COUNT(*) as 'stypes'
																	FROM		iservices
																	/*INNER JOIN	iservices_detail ON iservices_detail.service_ID = iservices.service_ID*/
																	WHERE		iservices.u_ID = '".$row_get_u_m[u_ID]."'
																	AND			iservices.status_ID = '4'
																	AND			iservices.service_Date_Start LIKE '".date('Y-m')."%'
																	";
																	//echo $sql_count_u_m;
											$query_count_u_m	=	mysqli_query($connect,$sql_count_u_m);
											$row_count_u_m		=	mysqli_fetch_array($query_count_u_m);
											$dataum[] 	=	"
															{
																name: '".$row_get_u_m['user_Fname']."',
																y: ".$row_count_u_m['stypes']."
															}
															";
										}
										echo implode(",", $dataum);
										?>

									]
								}]
							});
							<?
						}
						?>
					</script>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="card">
				<div class="card-header" style="background-color: #FFAEA3;">
					<div class="card-title">
						สรุปรายชื่อผู้ปฎิบัติงานประจำปี
					</div>
				</div>
				<div class="card-body">
					<div id="chart10"></div>
					<script type="text/javascript">
						$('#chart10').highcharts({
							chart: {
								type: 'column'
							},
							exporting: { 
								enabled: false 
							},
							title: {
								text: ''
							},
							subtitle: {
								text: ''
							},
							xAxis: {
								type: 'category'
							},
							yAxis: {
								title: {
									text: ' '
								}
							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										format: '{point.y}'
									}
								}
							},

							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
							},
							series: [{
								name: 'User',
								colorByPoint: true,
								data: [
									<?
									$sql_get_u_m			=	"
																SELECT	* 
																FROM	user
																WHERE	(user_Username != 'admin' and user_Username != 'apichart.lks')
																AND		user_Status	=	1
																";
									$query_get_u_m 			=	mysqli_query($connect,$sql_get_u_m);
									while($row_get_u_m		=	mysqli_fetch_array($query_get_u_m))
									{
										$sql_count_u_m 		=	"
															SELECT		COUNT(*) as 'stypes'
															FROM		iservices
															INNER JOIN	iservices_detail ON iservices_detail.service_ID = iservices.service_ID
															WHERE		iservices_detail.u_ID = '".$row_get_u_m[u_ID]."'
															AND			iservices.status_ID = '4'
															AND			iservices.service_Date_Start LIKE '".date('Y')."%'
															";
										$query_count_u_m	=	mysqli_query($connect,$sql_count_u_m);
										$row_count_u_m		=	mysqli_fetch_array($query_count_u_m);
										$chart10[] 	=	"
														{
															name: '".$row_get_u_m['user_Fname']."',
															y: ".$row_count_u_m['stypes']."
														}
														";
									}
									echo implode(",", $chart10);
									?>
								]
							}]
						});
					</script>
				</div>
			</div>
		</div>
	</div>


















		

	<?php include('nav-end.php'); ?>

	<?
	function countsec_Y($sec_ID)
	{
		global $connect;
		$sql	=	"
					SELECT	COUNT(*) as 'cou'
					FROM	iservices
					WHERE	sec_ID		=	'".$sec_ID."'
					AND		status_ID	=	4
					";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['cou'];
	}
	function countsec_thisM($sec_ID)
	{
		global $connect;
		$sql	=	"
					SELECT	COUNT(*) as 'cou'
					FROM	iservices
					WHERE	sec_ID	=	'".$sec_ID."'
					AND		service_Date_Start	LIKE	'".date('Y-m')."%'
					AND		status_ID	=	4
					";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['cou'];
	}
	function countsec_delM($sec_ID)
	{
		global $connect;
		$sql	=	"
					SELECT	COUNT(*) as 'cou'
					FROM	iservices
					WHERE	sec_ID	=	'".$sec_ID."'
					AND		service_Date_Start	LIKE	'".date('Y-m', strtotime("-30 days"))."%'
					AND		status_ID	=	4
					";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['cou'];
	}
	?>









	


















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