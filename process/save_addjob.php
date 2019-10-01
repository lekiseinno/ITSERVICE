<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../_connection/_connect_mysqli.r');



$sql	=	"
			SELECT	COUNT(service_ID_onJob) as 'cou'
			FROM	iservices
			WHERE	service_ID_onJob LIKE 'J".date('ymd')."%'
			";
$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
$cou	=	$row['cou'];



$sql2	=	"
			INSERT INTO iservices VALUES
			(
				'',
				'J".date('ymd').'-'.$cou."',
				'".$_POST[com]."',
				'".$_SESSION[u_ID]."',
				'".$_POST[dep]."',
				'".$_SESSION[sec_ID]."',
				'".$_POST[type]."',
				'".$_POST[subtype]."',
				'".$_POST[name]."',
				'-',
				'-',
				'".$_POST[detail]."',
				'".date('Y-m-d')."',
				'".date('H:i:s')."',
				'".date('Y-m-d')."',
				'".date('H:i:s')."',
				'',
				'',
				'',
				'',
				'1',
				'".$_SERVER[REMOTE_ADDR]."'
			);
			";
$query	=	mysqli_query($connect,$sql2) or die(mysqli_error());
echo "<script>window.location.href='../job-add.php'</script>";
?>