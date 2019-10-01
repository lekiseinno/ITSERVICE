<?php include('_connection/_connect_mysqli.r'); ?>

<?php echo getdata_action(); ?>

<?php


function getdata_action()
{
	global $connect;
	$sql	=	"
				SELECT	*
				FROM	wh_item
				";
	$query	=	mysqli_query($connect,$sql) or die(mysql_error());
	$data	=	'';
	while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$data	.=	'
					<span id="rs'.$row[item_ID].'"></span>
					<div class="modal fade" id="item'.$row[item_ID].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">item : '.$row[item_ID].'</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="col-8">
											<label>Item</label>
											<input class="form-control" readonly value="'.$row[item_Name].'">
										</div>
										<div class="col-4">
											<label>Qty of take</label>
											<input class="form-control" id="num'.$row[item_ID].'">
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<a href="#" id="btn'.$row[item_ID].'" class="col btn btn-lg btn-danger">Take Item</a>
									<script type="text/javascript">
										$("#btn'.$row[item_ID].'").click(function(){
											var	url	=	"ajax/save_export.php?id='.$row[item_ID].'&num=" + $("#num'.$row[item_ID].'").val();
											console.log(url);
											$.get(url , function( data ) {
												$("#rs'.$row[item_ID].'").html( data );
											});
										});
									</script>
								</div>
							</div>
						</div>
					</div>
					';
	}
	return	$data;
	
}



?>

