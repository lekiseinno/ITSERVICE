<?php

	date_default_timezone_set('Asia/Bangkok');

	$host			=	"10.10.2.31";
	$userhost		=	"root";
	$passhost		=	"LKG@Pa\$\$w0rd20i7";
	$dbname			=	"itservices";

	$connect		=	mysqli_connect("$host", "$userhost", "$passhost", "$dbname");

	if (!$connect) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		exit;
	}
?>