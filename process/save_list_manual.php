<?php
session_start();
date_default_timezone_set('Asia/Bangkok');

include('../_connection/_connect_mysqli.r');
echo "<pre>";
print_r($_POST);
echo "</pre>";

/* hardware */
$sql1	=	"
			INSERT INTO asset (asset_type_ID, asset_subtype_ID, com_ID, dep_ID, asset_rent, asset_Owner, asset_SN, asset_Detail1, asset_Detail2, asset_Detail3, asset_Detail4, asset_waranty, datecreate, lastupdate) VALUES (
				'".$_POST['type']."',
				'".$_POST['subtype']."',
				'".$_POST['company']."',
				'".$_POST['department']."',
				'".$_POST['rent']."',
				'".$_POST['owner']."',
				'".$_POST['sn']."',
				'".$_POST['detail1']."',
				'".$_POST['detail2']."',
				'".$_POST['detail3']."',
				'".$_POST['detail4']."',
				'".$_POST['waranty']."',
				now(),
				now()
			);
			";



/* Software */

for($i=0;$i<count($_POST['software']);$i++)
{
	$sql2	.=	"
				INSERT INTO asset (asset_type_ID, asset_subtype_ID, com_ID, dep_ID, asset_rent, asset_Owner, asset_SN, asset_Detail1, asset_Detail2, asset_Detail3, asset_Detail4, asset_waranty, datecreate, lastupdate) VALUES (
					'00002',
					'000',
					'".$_POST['company']."',
					'".$_POST['department']."',
					'0',
					'".$_POST['owner']."',
					'',
					'".$_POST['software'][$i]."',
					'".$_POST['detail2'][$i]."',
					'".$_POST['detail3'][$i]."',
					'".$_POST['detail4'][$i]."',
					'',
					now(),
					now()
				);
				";
}

$query	=	mysqli_query($connect,$sql1) or die(mysqli_error());
$query	=	mysqli_query($connect,$sql2) or die(mysqli_error());
echo "<script>alert('OK');window.location.href='../list-add-manual.php'</script>";

?>