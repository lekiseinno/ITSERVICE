<?php include('../_connection/_connect_mysqli.r'); ?>
<option disabled selected>== ประเภท ==</option>
<?
$sql	=	"
			SELECT	*
			FROM	asset_subtype
			WHERE	asset_type_ID	=	'".$_GET['type']."'
			ORDER BY	asset_subtype_Name	ASC
			";
$query	=	mysqli_query($connect,$sql) or die(mysqli_error());
while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
{
	?>
	<option value="<?php echo $row['asset_subtype_ID']; ?>"><?php echo $row["asset_subtype_Name"]?></option>
	<?
}
?>