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
			INSERT INTO asset (asset_type_ID, asset_subtype_ID, com_ID, dep_ID, asset_rent, asset_Owner, asset_SN, asset_Detail1, asset_Detail2, asset_Detail3, asset_Detail4, asset_waranty, datecreate, lastupdate) VALUES (
				'00002',
				'000',
				'".$_POST[company]."',
				'000',
				'0',
				'',
				'',
				'".$_POST[software]."',
				'".$_POST[partnumber]."',
				'".$_POST[ponumber]."',
				'".$_POST[qty]."',
				'',
				now(),
				now()
			);
			";
$query	=	mysqli_query($connect,$sql2) or die(mysqli_error());
echo "<script>alert('OK');window.location.href='../list-add-software.php'</script>";
?>