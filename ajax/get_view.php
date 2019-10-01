<?php include('_connection/_connect_mysqli.r'); ?>

<?php echo getdata_action(); ?>

<?php


function getdata_action()
{
	global $connect;
	$sql	=	"
				SELECT		iservices_detail.service_Detail,iservices.service_ID
				FROM		iservices
				INNER JOIN	iservices_detail	ON	iservices_detail.service_ID	=	iservices.service_ID
				WHERE		status_ID	=	4
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
									<label>Detail s</label>
									<textarea class="form-control" rows="5" id="detail'.$row['service_ID'].'">'.$row['service_Detail'].'</textarea>
								</div>
								
								<div class="modal-footer">
									<a href="#" class="btn  btn-outline-dark" data-dismiss="modal">Close</a>
								</div>
							</div>
						</div>
					</div>
					';
	}
	return	$data;
	
}





?>

