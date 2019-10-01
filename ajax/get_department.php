<?php 
include('../_connection/_connect_srvsql.php');

$srvsql			=	new	srvsql();
$connect_srvsql	=	$srvsql->connect_srvsql();
?>
<option disabled selected>== แผนก ==</option>
<?php
$sql_department		=	"
						SELECT		*
						FROM		[LeKise_Group].[dbo].[department]
						INNER JOIN	[LeKise_Group].[dbo].[company]	ON	[LeKise_Group].[dbo].[company].[company_Code]	=	[LeKise_Group].[dbo].[department].[company_Code]
						WHERE		[LeKise_Group].[dbo].[company].[company_ID]	=	'".$_GET['company_ID']."'
						ORDER BY	department_Name	ASC
						";
$query_department		=	sqlsrv_query($connect_srvsql,$sql_department) or die( 'SQL Error = '.$sql_department.'<hr><pre>'. print_r( sqlsrv_errors(), true) . '</pre>');
while($row_department	=	sqlsrv_fetch_array($query_department))
{
	?>
	<option value="<?php echo $row_department['department_Code']; ?>"><?php echo $row_department["department_Name"]?></option>
	<?php
}
?>
<option value="999">Others</option>
