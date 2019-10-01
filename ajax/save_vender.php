<?php
session_start();
include('../_connection/_connect_mysqli.r');
date_default_timezone_set('Asia/Bangkok');


	$sql		=	"
					UPDATE wh_vendor SET
						vendor_Name	=	'".$_GET[detail]."'
					WHERE vendor_ID =	'".$_GET[id]."'
					";






mysqli_query($connect,$sql) or die(mysqli_error());


echo "<script>window.location.href='item-vender.php'</script>";


?>