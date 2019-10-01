<?php
session_start();
include('../_connection/_connect_mysqli.r');
date_default_timezone_set('Asia/Bangkok');
/*
$_GET[id]
$_GET[action]
$_GET[detail]
*/
$action	=	$_GET[action];

if($action	==	"success")
{
	$status	=	4;
}
else
if($action	==	"update")
{
	$status	=	2;
}
else
if($action	==	"cancel")
{
	$status	=	3;
}




if($action	==	"success")
{
	$sql		=	"
					UPDATE	iservices	SET
						service_Date_Finish		=	'".date('Y-m-d')."',
						service_Time_Finish		=	'".date('H:i:s')."',
						service_Date_CloseJob	=	'".date('Y-m-d')."',
						service_Time_CloseJob	=	'".date('H:i:s')."',
						status_ID				=	'".$status."'
					WHERE	service_ID			=	'".$_GET[id]."'
					";
}
else
if($action	==	"update")
{
	$sql		=	"
					UPDATE	iservices	SET
						service_Date_Work		=	'".date('Y-m-d')."',
						service_Time_Work		=	'".date('H:i:s')."',
						status_ID				=	'".$status."'
					WHERE	service_ID			=	'".$_GET[id]."'
					";
}
else
if($action	==	"cancel")
{
	$sql		=	"
					UPDATE	iservices	SET
						status_ID				=	'".$status."'
					WHERE	service_ID			=	'".$_GET[id]."'
					";
}









$sql_detail	=	"
				INSERT INTO iservices_detail (service_ID, u_ID, service_detail) VALUES ('".$_GET[id]."', '".$_SESSION[u_ID]."', '".$_GET[detail]."');
				";


mysqli_query($connect,$sql) or die(mysqli_error());
mysqli_query($connect,$sql_detail) or die(mysqli_error());


echo "<script>window.location.href='job-new.php'</script>";


?>