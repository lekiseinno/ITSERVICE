<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include_once('../_connection/_connect_mysqli.r');








$count = COUNT($_POST[select_type]);

for($i=1;$i<=$count;$i++)
{
	$sql_get[$i]	=	"
					SELECT	*
					FROM	wh_item
					WHERE	item_Name	=	'".get_subtype($_POST[sub_type][$i])."'
					";
	$query_get[$i]	=	mysqli_query($connect,$sql_get[$i]);
	$nums_get[$i]	=	mysqli_num_rows($query_get[$i]);
	//
	if($nums_get[$i] > 0)
	{
		$sql_id			=	"
							SELECT	*
							FROM	wh_item
							WHERE	item_Name	= '".get_subtype($_POST[sub_type][$i])."';
							";
		$query_get		=	mysqli_query($connect,$sql_id);
		$row_get		=	mysqli_fetch_array($query_get,MYSQLI_ASSOC);
		$sql_item		=	"
							UPDATE	wh_item	SET
								item_QTY = (item_QTY+".$_POST[QTY][$i].")
							WHERE	item_Name	= '".get_subtype($_POST[sub_type][$i])."';
							";
		$sql_event		=	"
							INSERT INTO wh_item_transection (item_use_Date, item_ID, item_use_QTY, item_use_name, event_transection) VALUES (
								'".date('Y-m-d')."',
								'".$row_get[item_ID]."',
								'".$_POST[QTY][$i]."',
								'".$_SESSION[user_Username]."',
								'Import'
							);
							";
	}
	else
	{


		$sql_item[$i]		=	"
							INSERT INTO wh_item VALUES
							(
								'',
								'".get_subtype($_POST[sub_type][$i])."',
								'".$_POST[QTY][$i]."'
							);
							";
		mysqli_query($connect,$sql_item[$i]);


		$sql_id			=	"
							SELECT	*
							FROM	wh_item
							WHERE	item_Name	= '".get_subtype($_POST[sub_type][$i])."';
							";
		$query_get		=	mysqli_query($connect,$sql_id);
		$row_get		=	mysqli_fetch_array($query_get,MYSQLI_ASSOC);



		$sql_event[$i]		=	"
							INSERT INTO wh_item_transection (item_use_Date, item_ID, item_use_QTY, item_use_name, event_transection) VALUES (
								'".date('Y-m-d')."',
								'".$row_get[item_ID]."',
								'".$_POST[QTY][$i]."',
								'".$_SESSION[user_Username]."',
								'Import'
							);
							";
		mysqli_query($connect,$sql_event[$i]);
	}


}




function get_subtype($subtype_ID)
{
	global $connect;
	$sql	=	"
					SELECT	*
					FROM	type_sub
					WHERE	subtype_ID = '".$subtype_ID."'
					";
	$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
	$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
	return	$row['subtype_Detail'];
}
echo "<script>alert('!! Success !!');window.location.href='../item.php'</script>";




?>

