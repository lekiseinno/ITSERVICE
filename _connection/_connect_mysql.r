<?

$host			=	"localhost";		//HOST NAME
$userhost		=	"root";				//Username Login DATABASE - MYSQL
$passhost		=	"123456";			//Password Login DATABASE - MYSQL
$dbname			=	"itservices";		//NAME OF DATA BASE TO USE

mysql_connect("$host","$userhost","$passhost");
mysql_query("SET NAMES UTF8");
mysql_select_db("$dbname");

?>