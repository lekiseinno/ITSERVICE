<?php include('../_connection/_connect_mysqli.r'); ?>

	<hr>
	<div class="row rows">
		<div class="col-3">
			<label>iTem Type</label>
		</div>
		<div class="col-3">
			<label>iTem Sub Type</label>
		</div>
		<div class="col-2">
			<label>Qty</label>
		</div>
		<div class="col-4">
			<label>Note</label>
		</div>
	</div>





<?
for($i=1;$i<=$_GET[num];$i++)
{
		
	?>
	<div class="row">
		<div class="col-md-3">
			<select class="form-control" id="type<?=$i?>" name="select_type[<?=$i?>]">
				<option selected disabled> == Select type == </option>
				<?
				$sql		=	"
								SELECT * 
								FROM type
								";
				$query		=	mysqli_query($connect,$sql);
				while($row	=	mysqli_fetch_array($query))
				{
					?>
					<option value="<?=$row[type_ID]?>"><?=$row[type_Detail]?></option>
					<?
				}
				?>
			</select>
			<script type="text/javascript">
				$("#type<?=$i?>").change(function(){
					var url = "ajax/get_Subtype.php?type=" + $("#type<?=$i?>").val();
					console.log(url);
					
					$.get(url , function( data ) {
						$("#Subtype<?=$i?>").html( data );
					});
					
				});
			</script>
		</div>
		<div class="col-md-3">
			<select class="form-control" id="Subtype<?=$i?>" name="sub_type[<?=$i?>]">
				<option selected disabled> == Select sub type == </option>
			</select>	
		</div>
		<div class="col-md-2">
			<input name="QTY[<?=$i?>]" class="form-control">
		</div>
		<div class="col-md-4">
			<input name="item_name[<?=$i?>]" class="form-control">
		</div>
	</div>
	<?	
}
?>