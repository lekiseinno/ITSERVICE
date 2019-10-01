<?php include('_connection/_connect_mysqli.r'); ?>

<?php echo getdata_action(); ?>

<?php


function getdata_action()
{
	global $connect;
	$sql	=	"
				SELECT	*
				FROM	iservices
				WHERE		status_ID	=	2
				";
	$query	=	mysqli_query($connect,$sql) or die(mysql_error());
	$data	=	'';
	while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$data	.=	'
					<span id="rs'.$row['service_ID'].'"></span>
					<div class="modal fade" id="service'.$row['service_ID'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Service : '.$row['service_ID'].'</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									'.get_datail($row['service_ID']).'
									<label>Detail</label>
									<textarea class="form-control" rows="5" id="detail'.$row['service_ID'].'"></textarea>
								</div>
								<div class="modal-footer">
									<a href="#" id="btn_can'.$row['service_ID'].'" class="col btn btn-lg btn-danger">Reject Job</a>
									<a href="#" id="btn_upd'.$row['service_ID'].'" class="col btn btn-lg btn-primary">Update Job</a>
									<a href="#" id="btn_suc'.$row['service_ID'].'" class="col btn btn-lg btn-success">Success Job</a>
									<script type="text/javascript">
										$("#btn_can'.$row['service_ID'].'").click(function(){
											var	url	=	"ajax/save_action.php?id='.$row['service_ID'].'&action=cancel&detail=" + $("#detail'.$row['service_ID'].'").val();
											console.log(url);
											$.get(url , function( data ) {
												$("#rs'.$row['service_ID'].'").html( data );
											});
										});
										$("#btn_upd'.$row['service_ID'].'").click(function(){
											var	url	=	"ajax/save_action.php?id='.$row['service_ID'].'&action=update&detail=" + $("#detail'.$row['service_ID'].'").val();
											console.log(url);
											$.get(url , function( data ) {
												$("#rs'.$row['service_ID'].'").html( data );
											});
										});
										$("#btn_suc'.$row['service_ID'].'").click(function(){
											var	url	=	"ajax/save_action.php?id='.$row['service_ID'].'&action=success&detail=" + $("#detail'.$row['service_ID'].'").val();
											console.log(url);
											$.get(url , function( data ) {
												$("#rs'.$row['service_ID'].'").html( data );
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


function get_datail($id)
{
	global $connect;
	$sql	=	"
				SELECT	*
				FROM	iservices_detail
				WHERE	service_ID	=	'".$id."'
				";
	$query	=	mysqli_query($connect,$sql) or die(mysql_error());
	$data	=	'';
	$i		=	1;
	while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
	{
		$data	.=	$i.'. '.$row["service_detail"];
		$data	.=	'<hr>';
	}

	return $data;
}



?>

