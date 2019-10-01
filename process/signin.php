<?
session_start();
date_default_timezone_set('Asia/Bangkok');
include('../_connection/_connect_mysqli.r');
if(!empty($_POST['username']) and !empty($_POST['password']))
{


	/********************************************************/

	// START GET IP WAN OR LAn
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ips	=	$_SERVER['HTTP_CLIENT_IP'];
	}
	else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ips	=	$_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	else
	{
		$ips	=	$_SERVER['REMOTE_ADDR'];
	}
	// END GET IP WAN OR LAn
	// ips = IP WAN or LAN



	function getBrowser(){ 
		$u_agent	=	$_SERVER['HTTP_USER_AGENT']; 
		$bname		=	'Unknown';
		$platform	=	'Unknown';
		$version	=	"";

		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'Linux';
		}
		else if(preg_match('/macintosh|mac os x/i', $u_agent))
		{
			$platform = 'Mac';
		}
		else if(preg_match('/windows|win32/i', $u_agent))
		{
			$platform = 'Windows';
		}

		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname	=	'Internet Explorer'; 
			$ub		=	"MSIE"; 
		} 
		elseif(preg_match('/Firefox/i',$u_agent)) 
		{ 
			$bname	=	'Mozilla Firefox'; 
			$ub		=	"Firefox"; 
		} 
		elseif(preg_match('/Chrome/i',$u_agent)) 
		{ 
			$bname	=	'Google Chrome'; 
			$ub		=	"Chrome"; 
		} 
		elseif(preg_match('/Safari/i',$u_agent)) 
		{ 
			$bname	=	'Apple Safari'; 
			$ub		=	"Safari"; 
		} 
		elseif(preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname	=	'Opera'; 
			$ub		=	"Opera"; 
		} 
		elseif(preg_match('/Netscape/i',$u_agent)) 
		{ 
			$bname	=	'Netscape'; 
			$ub		=	"Netscape"; 
		} 

		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches))
		{
		}

		$i	=	count($matches['browser']);
		if ($i != 1) {
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub))
			{
				$version= $matches['version'][0];
			}
			else
			{
				$version= $matches['version'][1];
			}
		}
		else
		{
			$version= $matches['version'][0];
		}

		if ($version==null || $version=="") {$version="?";}
		return array(
			'userAgent'	=>	$u_agent,
			'name'		=>	$bname,
			'version'	=>	$version,
			'platform'	=>	$platform,
			'pattern'	=>	$pattern
		);
	}

		$ua =	getBrowser();

		//Device
		$iPod 				=	stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
		$iPhone 			=	stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$iPad 				=	stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
		$Android			=	stripos($_SERVER['HTTP_USER_AGENT'],"Android");
		$win10				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 10");
		$win81 				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 6.3");
		$win8 				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 6.2");
		$win7 				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 6.1");
		$winvista			=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 6.0");
		$winserv2003x64 	=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 5.2");
		$winxpnt			=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 5.1");
		$winxp 				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows xp");
		$win2000 			=	stripos($_SERVER['HTTP_USER_AGENT'],"windows nt 5.0");
		$winme 				=	stripos($_SERVER['HTTP_USER_AGENT'],"windows me");
		$win98 				=	stripos($_SERVER['HTTP_USER_AGENT'],"win98");
		$win95 				=	stripos($_SERVER['HTTP_USER_AGENT'],"win95");
		$win16 				=	stripos($_SERVER['HTTP_USER_AGENT'],"win16");
		$macosx 			=	stripos($_SERVER['HTTP_USER_AGENT'],"macintosh|mac os x");
		$macos9				=	stripos($_SERVER['HTTP_USER_AGENT'],"mac_powerpc");
		$linux 				=	stripos($_SERVER['HTTP_USER_AGENT'],"linux");
		$ubuntu 			=	stripos($_SERVER['HTTP_USER_AGENT'],"ubuntu");
		$blackberry 		=	stripos($_SERVER['HTTP_USER_AGENT'],"blackberry");
		$webos 				=	stripos($_SERVER['HTTP_USER_AGENT'],"webos");

		if($iPod)
		{
			$devices	=	'iPod';
		}
		else if($iPhone)
		{
			$devices	=	'iPhone';
		}
		else if($iPad)
		{
			$devices	=	'iPad';
		}
		else if($Android)
		{
			$devices	=	'Android';
		}
		else if($win10)
		{
			$devices	=	'Windows 10';
		}
		else if($win81)
		{
			$devices	=	'Windows 8.1';
		}
		else if($win8)
		{
			$devices	=	'Windows 8';
		}
		else if($win7)
		{
			$devices	=	'Windows 7';
		}
		else if($winvista)
		{
			$devices	=	'Windows Vista';
		}
		else if($winserv2003x64)
		{
			$devices	=	'Windows Server2003 or Windows XP x64';
		}
		else if($winxpnt)
		{
			$devices	=	'Windows (NT) XP';
		}
		else if($winxp)
		{
			$devices	=	'Windows XP';
		}
		else if($win2000)
		{
			$devices	=	'Windows 2000';
		}
		else if($winme)
		{
			$devices	=	'Windows ME';
		}
		else if($win98)
		{
			$devices	=	'Windows 98';
		}
		else if($win95)
		{
			$devices	=	'Windows 95';
		}
		else if($win16)
		{
			$devices	=	'Windows 3.11';
		}
		else if($macosx)
		{
			$devices	=	'Mac OS X';
		}
		else if($macos9)
		{
			$devices	=	'Mac OS 9';
		}
		else if($linux)
		{
			$devices	=	'Linux';
		}
		else if($ubuntu)
		{
			$devices	=	'Ubuntu';
		}
		else if($blackberry)
		{
			$devices	=	'Blackberry';
		}
		else if($webos)
		{
			$devices	=	'Webos';
		}
		else
		{
			$devices	=	'Other';
		}




	/********************************************************/






	$sql	=	"
				SELECT	*
				FROM	user
				WHERE	user_username		=	'".$_POST['username']."'
				AND		user_password		=	'".$_POST['password']."'
				";
	$query	=	mysqli_query($connect,$sql) or die('SQL = '.$sql.' / Error = '.mysqli_error());
	$row	=	mysqli_fetch_array($query);
	$num	=	mysqli_num_rows($query);
	if($num	==	0)
	{
		$sql_log		=	"
							INSERT INTO	log_login	VALUES
							(
								'',
								'".$_POST['username']."',
								'".date('Y-m-d')."',
								'".date('H:i:s')."',
								'".$ua['platform']."',
								'".$devices."',
								'".$ua['name']."',
								'".$ua['version']."',
								'".$ips."',
								'Lost Password'
							);
							";
		$query_log		=	mysqli_query($connect,$sql_log)	or die('SQL Error = '.$sql_log);
		echo "<script>alert('ตรวจสอบ Username หรือ Password');window.history.back();</script>";
	}
	else
	{
		$_SESSION['u_ID']			=	$row['u_ID'];
		$_SESSION['sec_ID']			=	$row['u_sec'];
		$_SESSION['dep_ID']			=	$row['dep_ID'];
		$_SESSION['pos_ID']			=	$row['pos_ID'];
		$_SESSION['user_code']		=	$row['user_code'];
		$_SESSION['user_Username']	=	$row['user_Username'];
		$_SESSION['user_Tname']		=	$row['user_Tname'];
		$_SESSION['user_Fname']		=	$row['user_Fname'];
		$_SESSION['user_Lname']		=	$row['user_Lname'];
		$_SESSION['user_Email']		=	$row['user_Email'];
		$_SESSION['user_Photo']		=	$row['user_Photo'];
		$_SESSION['user_LV']		=	$row['user_LV'];


		$sql_update		=	"
							UPDATE	user	SET
							user_Status		= '1'
							WHERE	u_ID	= ".$row['u_ID'].";
							";
		$sql_log		=	"
							INSERT INTO	log_login	VALUES
							(
								'',
								'".$_POST['username']."',
								'".date('Y-m-d')."',
								'".date('H:i:s')."',
								'".$ua['platform']."',
								'".$devices."',
								'".$ua['name']."',
								'".$ua['version']."',
								'".$ips."',
								'Login Success'
							)
							";
		$query_update	=	mysqli_query($connect,$sql_update)	or die('SQL Error = '.$sql_update);
		$query_log		=	mysqli_query($connect,$sql_log)		or die('SQL Error = '.$sql_log);

		echo "<script>alert('ยินดีต้อนรับ ".$row['user_Tname']."  ".$row['user_Fname']."  ".$row['user_Lname']." เข้าสู่ระบบ ');window.location.href='../index.php'</script>";
	
	}
}
else
{
	echo "<script>alert('กรุณาใส่ให้ครบทุกช่อง');window.history.back();</script>";
}

?>