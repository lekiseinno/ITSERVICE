<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Bootstrap Admin App + jQuery">
	<meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
	<title>IT Service</title>
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">


	<script src="vendor/jquery/dist/jquery.js"></script>

	<style type="text/css">
		html,body{
			background-color: #fff;
		}
		table
		{
			border-spacing: 0px;
			width: 100%;
		}
		tr td
		{
			padding: 0.35%;
		}
		table table
		{
			padding: 1.5%;
		}
	</style>

</head>

<body>
<?php

include('_connection/_connect_srvsql.php');
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

	function get_depname($dep_ID)
	{
		global $connect_srvsql;
		$sql	=	"
						SELECT	*
						FROM	[LeKise_Group].[dbo].[department]
						WHERE	[LeKise_Group].[dbo].[department].[department_ID] = '".$dep_ID."'
						";
		$query	=	sqlsrv_query($connect_srvsql,$sql) or die( 'SQL Error = '.$sql.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
		$row	=	sqlsrv_fetch_array($query);
		return	$row['department_Name'];
	}

?>



	<?php include('_connection/_connect_mysqli.r');	?>
	<?php include('func/functions.php'); ?>
	<?php
	$sql	=	"
				SELECT		*
				FROM		iservices
				INNER JOIN	iservices_detail	ON	iservices.service_ID	=	iservices_detail.service_ID
				INNER JOIN	type				ON	type.type_ID			=	iservices.type_ID
				INNER JOIN	type_sub			ON	type_sub.subtype_ID		=	iservices.subtype_ID
				INNER JOIN	user				ON	user.u_ID	=	iservices.u_ID
				WHERE		iservices.service_ID	=	'".$_GET[service_ID]."'
				";
				//echo $sql;
	$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
	$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
	?>


	<div style="padding: 2%">

		<table border="1" width="100%">
			<tr>
				<td align="center" width="15%"><img src="img/Logo_Group.jpg"></td>
				<td align="center"> ใบแจ้งซ่อมอุปกรณ์ IT </td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="0">
						<tr>
							<td colspan="2"> <b><u>สำหรับผู้แจ้งซ่อม</u></b> </td>
						</tr>
						<tr>
							<td width="50%"> ชื่อ/สกุล : <b><?php echo $row[service_Nameitem]; ?></b></td>
							<td width="50%"> แผนกฝ่าย : <b><?php echo get_comname($row[com_ID]).' / '.get_depname($row[dep_ID]); ?></b></td>
						</tr>
						<tr>
							<td> เบอร์โทรศัพท์ภายใน : <b><?php echo $row[service_Tel]; ?></b></td>
							<td> Email : <b><?php echo $row[service_email]; ?></b></td>
						</tr>
						<tr>
							<td> ชื่อเครื่อง : - </td>
							<td> วันที่ : <b><?php echo $row[service_Date_Start]; ?></b></td>
						</tr>
						<tr>
							<td colspan="2"> รายการ / ประเภท : <b><?php echo $row[type_Detail] . ' / ' . $row[subtype_Detail]; ?></b></td>
						</tr>
						<tr>
							<td colspan="2"> ปัญหาที่พบ : <b><?php echo $row[service_Detail]; ?></b></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="0">
						<tr>
							<td colspan="4"><b><u>สำหรับเจ้าหน้าที่ IT</u></b></td>
						</tr>
						<tr>
							<td>วันที่ที่ได้รับการแจ้งซ่อม : <b><?php echo $row[service_Date_Work]; ?></b></td>
							<td> เวลา :  <b><?php echo $row[service_Time_Work]; ?></b></td>
							<td><input type="checkbox" checked name="">ซ่อมภายใน</td>
							<td><input type="checkbox" name="">ส่งซ่อม</td>
						</tr>
						<tr>
							<td colspan="4"> &nbsp; </td>
						</tr>
						<tr>
							<td colspan="4">วิธีแก้ไข : <b><?php echo $row[service_detail]; ?></b></td>
						</tr>
						<tr>
							<td colspan="4"> ชื่อผู้แก้ไข : <b><?php echo $row[user_Tname].' '.$row[user_Fname].' '.$row[user_Lname]; ?></b></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div align="right">
			LKG-IT1-FM-006/REV.NO.01
		</div>

	</div>






	




</body>
</html>