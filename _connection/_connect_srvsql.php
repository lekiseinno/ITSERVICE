<?php
class srvsql
{
	public function connect_srvsql()
	{
		$serverName			=	"10.10.2.31";
		//$serverName			=	"lekise.dyndns.biz,1135";
		$connectionInfo		=	array(
										"Database"					=>	"LeKise_Group",
										"UID"						=>	"innovation_hr",
										"PWD"						=>	"Passw0rd@2018LeKise20i8",
										"MultipleActiveResultSets"	=>	true,
										"CharacterSet"				=>	'UTF-8',
										'ReturnDatesAsStrings'		=>	true
									);
		$connect_signin		=	sqlsrv_connect($serverName,$connectionInfo);
		if(!$connect_signin) {
			echo "<h1>Connection could not be established.</h1><hr><br />";
			die( '<pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
		}
		else
		{
			return	$connect_signin;
		}
	}


	public function query($sql)
	{
		$connect	=	$this->connect();
		$query		=	sqlsrv_query($connect,$sql) or die( 'SQL Error = '.$sql.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
		$row		=	sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC);
		return		$row;
	}

	public function query_signin($sql)
	{
		$connect_signin	=	$this->connect_signin();
		$query			=	sqlsrv_query($connect_signin,$sql) or die( 'SQL Error = '.$sql.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
		$row			=	sqlsrv_fetch_array($query,SQLSRV_FETCH_ASSOC);
		return		$row;
	}
}
