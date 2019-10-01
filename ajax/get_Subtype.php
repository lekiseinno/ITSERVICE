<?php include('../_connection/_connect_mysqli.r'); ?>
<option disabled selected>== ประเภท ==</option>
<?
$sql	=	"
			SELECT	*
			FROM	type_sub
			WHERE	type_ID	=	'".$_GET['type']."'
			ORDER BY	subtype_Detail	ASC
			";
$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	?>
	<option value="<?php echo $row['subtype_ID']; ?>"><?php echo $row["subtype_Detail"]?></option>
	<?
}
?>