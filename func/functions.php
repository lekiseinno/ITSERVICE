<?php

include('_connection/_connect_mysqli.r');


	function get_com($com_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	company
						WHERE	com_ID = '".$com_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['com_T'];
	}
	
	function get_dep($dep_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	department
						WHERE	dep_ID = '".$dep_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['dep_Name'];
	}

	function get_sec($sec_ID)
	{
		if($sec_ID	==	1){	$sec	=	'<span class="badge badge-app">App</span>';		}
		if($sec_ID	==	2){	$sec	=	'<span class="badge badge-dev">Infra</span>';		}
		if($sec_ID	==	3){	$sec	=	'<span class="badge badge-dmk">Dev</span>';		}
		if($sec_ID	==	4){	$sec	=	'<span class="badge badge-inf">Inno</span>';	}
		if($sec_ID	==	5){	$sec	=	'<span class="badge badge-inn">DMK</span>';	}

		return	$sec;
	}

	function get_type($type_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	type
						WHERE	type_ID = '".$type_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['type_Detail'];
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


	function get_status($status)
	{
		if($status	==	1){	$stat	=	'<span class="badge badge-danger">New</span>';			}
		if($status	==	2){	$stat	=	'<span class="badge badge-info">Working</span>';		}
		if($status	==	3){	$stat	=	'<span class="badge badge-warning">Cancel</span>';		}
		if($status	==	4){	$stat	=	'<span class="badge badge-success">Close JOB</span>';	}

		return	$stat;
	}



	function get_lot($lot_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	wh_item_lot
						WHERE	lot_ID = '".$lot_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		$data	=	'';
		$data	.=	$row['lot_ID'].' - '.$row['lot_date_import'];
		return	$data;
	}

	function get_item($item_ID)
	{
		global $connect;
		$sql	=	"
						SELECT		*
						FROM		wh_item
						WHERE		item_ID = '".$item_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		return	$row['item_Name'];
	}







	function get_asset_type($type_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	asset_type
						WHERE	asset_type_ID = '".$type_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		$data	=	$row['asset_type_Name'];
		return	$data;
	}

	function get_asset_subtype($subtype_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	asset_subtype
						WHERE	asset_subtype_ID = '".$subtype_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		$data	=	$row['asset_subtype_Name'];
		return	$data;
	}

	function get_asset_detail($asset_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	*
						FROM	asset
						WHERE	asset_ID = '".$asset_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
		$data	=	'';
		$data	.=	$row['asset_Detail1']."<br>";
		$data	.=	$row['asset_Detail2']."<br>";
		$data	.=	$row['asset_Detail3']."<br>";
		$data	.=	$row['asset_Detail4']."<br>";
						
		return	$data;
	}

	function get_asset_count($com_ID,$asset_type_ID,$asset_subtype_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						AND		asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_subtype_ID	=	'".$asset_subtype_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}

	function get_asset_countall($com_ID,$asset_type_ID)
	{
		global $connect;
		if($asset_type_ID	==	'all')
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						";
		}
		else
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						AND		asset_type_ID		=	'".$asset_type_ID."'
					";
		}
		

		
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}



	function get_asset_counttotal($asset_type_ID,$asset_subtype_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_subtype_ID	=	'".$asset_subtype_ID."'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}

	function get_asset_countalltotal($asset_type_ID)
	{
		global $connect;
		if($asset_type_ID	==	'all')
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						";
		}
		else
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	asset_type_ID		=	'".$asset_type_ID."'
						";
		}
			
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}
















	function get_asset_count_rent($com_ID,$asset_type_ID,$asset_subtype_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						AND		asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_subtype_ID	=	'".$asset_subtype_ID."'
						AND		asset_rent			=	'1'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}

	function get_asset_countall_rent($com_ID,$asset_type_ID)
	{
		global $connect;
		if($asset_type_ID	==	'all')
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						AND		asset_rent			=	'1'
						";
		}
		else
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	com_ID				=	'".$com_ID."'
						AND		asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_rent			=	'1'
					";
		}
		

		
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}



	function get_asset_counttotal_rent($asset_type_ID,$asset_subtype_ID)
	{
		global $connect;
		$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_subtype_ID	=	'".$asset_subtype_ID."'
						AND		asset_rent			=	'1'
						";
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}

	function get_asset_countalltotal_rent($asset_type_ID)
	{
		global $connect;
		if($asset_type_ID	==	'all')
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						AND		asset_rent			=	'1'
						";
		}
		else
		{
			$sql	=	"
						SELECT	COUNT(*) as 'cou'
						FROM	asset
						WHERE	asset_type_ID		=	'".$asset_type_ID."'
						AND		asset_rent			=	'1'
						";
		}
			
		$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
		$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
						
		return	$row['cou'];
	}

	

?>