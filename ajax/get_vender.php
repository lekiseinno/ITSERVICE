<?php include('_connection/_connect_mysqli.r'); ?>

<?php echo getdata_action(); ?>

<?php


function getdata_action()
{
	global $connect;
	$sql	=	"
				SELECT	*
				FROM	wh_vendor
				";
	$query	=	mysqli_query($connect,$sql) or die(mysql_error());
	$data	=	'';
	while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$data	.=	'
					<span id="rs'.$row[vendor_ID].'"></span>
					<div class="modal fade" id="vender'.$row[vendor_ID].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Service : '.$row[vendor_ID].'</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<label>Detail</label>
									<input class="form-control" id="detail'.$row[vendor_ID].'" value="'.$row[vendor_Name].'">
								</div>
								<div class="modal-footer">
									<a href="#" id="btn'.$row[vendor_ID].'" class="col btn btn-lg btn-primary">Update</a>
									<script type="text/javascript">
										$("#btn'.$row[vendor_ID].'").click(function(){
											var	url	=	"ajax/save_vender.php?id='.$row[vendor_ID].'&detail=" + $("#detail'.$row[vendor_ID].'").val();
											//console.log(url);
											$.get(url , function( data ) {
												$("#rs'.$row[vendor_ID].'").html( data );
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

