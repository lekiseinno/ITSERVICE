<?php
session_start();
include('../_connection/_connect_mysqli.r');
date_default_timezone_set('Asia/Bangkok');


	$sql		=	"
					UPDATE wh_item SET
						item_QTY = (item_QTY-'".$_GET[num]."')
					WHERE	item_ID	=	'".$_GET[id]."'
					";
	$sql_event	=	"
					INSERT INTO wh_item_transection (item_use_Date, item_ID, item_use_QTY, item_use_name, event_transection) VALUES (
						'".date('Y-m-d')."',
						'".$_POST[sub_type][$i]."',
						'".$_POST[QTY][$i]."',
						'".$_SESSION[user_Username]."',
						'Export'
					);
					";





mysqli_query($connect,$sql) or die(mysqli_error());
mysqli_query($connect,$sql_event) or die(mysqli_error());


echo "<script>window.location.href='item-export.php'</script>";


?>