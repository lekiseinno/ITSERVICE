<?php
$serverName			=	"10.10.2.31";
$connectionInfo		=	array(
								"Database"					=>	"HR_Labour_cost",
								"UID"						=>	"innovation_hr",
								"PWD"						=>	"LeKise20i7",
								"MultipleActiveResultSets"	=>	true,
								"CharacterSet"				=>	'UTF-8'
							  );
$connect	=	sqlsrv_connect($serverName,$connectionInfo);

if(!$connect) {
	echo "<h1>Connection could not be established.</h1><hr><br />";
	echo "<pre>";
		die(print_r(sqlsrv_errors(),true));
	echo "</pre>";
}
?>