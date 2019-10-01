<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Bootstrap Admin App + jQuery">
	<meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
	<title>IT Service</title>
	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
	<link rel="stylesheet" href="vendor/animate.css/animate.css">
	<link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
	<link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css" id="bscss">
	<link rel="stylesheet" href="css/app.css" id="maincss">
	<link rel="stylesheet" href="css/addon.css">
	<script src="vendor/jquery/dist/jquery.js"></script>
</head>

<body>
	
	<?php include('_connection/_connect_mysqli.r'); ?>

	<?php include('nav-start.php'); ?>











	<?php include("class/connect.php"); ?>
	<?php 
	$class_con_LeKise_Group = new Sqlsrv_LeKise_Group();
	$class_con_LeKise_Group->getConnect();
	$query=$class_con_LeKise_Group->getQuery("
		SELECT	company_Code,department_Code,department_Name
		FROM	department
		WHERE	company_Code='LKL'
		OR		company_Code='LKS'
		OR		company_Code='LKT'
		OR		company_Code='OMP'
		OR		company_Code='WTL'
		");
	while($result=$class_con_LeKise_Group->getResult($query)){
		$company_Code[] = $result["company_Code"];
		$department_Code[] = $result["department_Code"];
		$department_Name[] = $result["department_Name"];
	}
	?>
	<style type="text/css">
		.bg-green{
			background-color: #008000;	
			color: #FFFFFF;
		}
		.bg-red{
			background-color: #FF0000;	
			color: #FFFFFF;
		}
		.btn-icon-split .icon{
			padding: .600rem .75rem !important;
		}
	</style>
	<?php 
	function checkdate_present($expire_date,$today_date){
		$expire_explode	=	explode("-", $expire_date);
		$expire_day		=	$expire_explode[0];
		$expire_month	=	$expire_explode[1];
		$expire_year	=	$expire_explode[2];
		$today_explode	=	explode("-", $today_date);
		$today_day		=	$today_explode[0];
		$today_month	=	$today_explode[1];
		$today_year		=	$today_explode[2];
		$expire			=	gregoriantojd($expire_month,$expire_day,$expire_year);
		$today			=	gregoriantojd($today_month,$today_day,$today_year);

		$date_current	=	$expire-$today; //หาวันที่ยังเหลืออยู่
		return $date_current;
	}
	?>
<body id="page-top">
	<div id="wrapper">
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<form action="frm_/process/update_data.php" method="POST">
								<div class="card shadow mb-4">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Printer Form (ส่งซ่อมปริ้นเตอร์)</h6>
									</div>
									<div class="card-body" style="display: inline-flex;">
										<div class="col-sm-3">
											<input type="text" name="brand" id="brand" placeholder="Brand" class="form-control" required>
										</div>
										<div class="col-sm-3">
											<input type="text" name="model" id="model" placeholder="Model" class="form-control" required>
										</div>
										<div class="col-sm-3">
											<input type="text" name="supplier" id="supplier" placeholder="Supplier" class="form-control" required> 
										</div>
										<div class="col-sm-3">
											<textarea name="remark" id="remark" class="form-control" placeholder="สาเหตุ" required></textarea>
										</div>
									</div>
									<div class="card-body" style="display: inline-flex;">
										<div class="col-sm-3">
											<select name="depart" id="depart" class="form-control" style="width: 100%;" required>
												<option value='#'>แผนกที่ส่งซ่อม</option>
												<?php foreach ($company_Code as $key => $value) {?>
													<option value="<?php echo $value." | ".$department_Name[$key] ?>"><?php echo $value." | ".$department_Name[$key]; ?></option>
												<?php  } ?>
											</select>
										</div>
										<div class="col-sm-3" style="padding-bottom: 1%;">
											<select name="status" id="status" class="form-control" style="width: 100%;" required>
												<option value="1">ได้รับ</option>
												<option value="0">ยังไม่ได้รับคืน</option>
											</select>
										</div>
										<div class="col-sm-3" style="text-align: left;">
											<input type="hidden" name="method" id="method" value="printer">
											<input type="hidden" name="method_status" id="method_status" value="add">
											<button type="submit" class="btn btn-success"><i class="fa fa-download"></i> Save</button>
										</div>
									</div>
								</div>
							</form>

						</div>
					</div>
					<?php 
					$class_con_printer = new Sqlsrv_quotation_approve();
					$class_con_printer->getConnect();
					$query=$class_con_printer->getQuery("
						SELECT *
						FROM Printer_Approve
						");
					while($result=$class_con_printer->getResult($query)){
						$id[] = $result["id"];
						$brand[] = $result["brand"];
						$model[] = $result["model"];
						$supplier[] = $result["supplier"];
						$remark[] = $result["remark"];
						$department[] = $result["department"];
						$date_approve[] = $result["date_approve"];
						$date_receive[] = $result["date_receive"];
						$status[] = $result["status"];
						$user_create[] = $result["user_create"];
						$date_create[] = $result["date_create"];
						$user_update[] = $result["user_update"];
						$date_update[] = $result["date_update"];
						$list_status[] = $result["list_status"];
					}
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Printer Table</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable_printer" width="100%" cellspacing="0">
											<thead>
												<tr align="center">
													<th>ID</th>
													<th>Brand</th>
													<th>Model</th>
													<th>Suplier</th>
													<th>สาเหตุ</th>
													<th>แผนกที่ส่งซ่อม</th>
													<th>วันที่ส่ง</th>
													<th>จำนวนวันที่ส่งซ่อม</th>
													<th>สถานะรับคืน</th>
													<th>ผู้บันทึก</th>
													<th>วันที่บันทึก</th>
													<th>สถานะรายการ</th>
													<th>Update</th>
													<th>ยกเลิก</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												if(!empty($id))
												{
													foreach ($id as $row => $ids) {
														?>
														<tr align="center">
															<td><?php echo $ids ?></td>
															<td><?php echo $brand[$row] ?></td>
															<td><?php echo $model[$row] ?></td>
															<td><?php echo $supplier[$row] ?></td>
															<td><?php echo $remark[$row] ?></td>
															<td><?php echo $department[$row] ?></td>
															<td><?php echo date("Y-m-d H:i", strtotime($date_approve[$row])); ?></td>
															<?php 
															if($status[$row]=="0"){
																$date_check = str_replace('-','',checkdate_present(date("d-m-Y", strtotime($date_approve[$row])),date("d-m-Y"))); 
																$status_date_fix = $date_check." วัน";
															}else{
																$date_check = str_replace('-','',checkdate_present(date("d-m-Y", strtotime($date_approve[$row])),date("d-m-Y", strtotime($date_receive[$row]))));
																$status_date_fix = "วันที่ได้รับ ".date("Y-m-d H:i", strtotime($date_receive[$row]))." จำนวนวันซ่อม (".$date_check.") วัน";
															}
															?>
															<td><?php echo $status_date_fix ?></td>
															<?php 
															if($status[$row]=="1"){
																$status_bg = "<div class='bg-green'>ได้รับ</div>";
															}else{
																$status_bg = "<div class='bg-red'>ยังไม่ได้รับคืน</div>";
															}
															?>
															<td><?php echo $status_bg; ?></td>
															<td><?php echo $user_create[$row] ?></td>
															<td><?php echo date("Y-m-d H:i", strtotime($date_create[$row])); ?></td>
															<?php 
															if($list_status[$row]=="1"){
																$list_status_sys = "<div class='bg-green'>ใช้งาน</div>";
															}else{
																$list_status_sys = "<div class='bg-red'>ยกเลิกรายการนี้ </div>";
															}
															?>
															<td><?php echo $list_status_sys ?></td>
															<td><a class="btn btn-warning btn-icon-split" href="#" data-toggle="modal" data-target="#EditModalID<?php echo $ids ?>">
																<span class="icon text-white-50">
																	<i class="fa fa-pencil-square-o"></i>
																</span>
																<span class="text">Edit</span>
															</a></td>
															<!-- Edit Modal-->
															<div class="modal fade" id="EditModalID<?php echo $ids ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="exampleModalLabel">Edit Printer</h5>
																			<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">×</span>
																			</button>
																		</div>
																		<form action="frm_/process/update_data.php" method="POST">
																			<div class="modal-body">
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">Brand</label>
																					<div class="col-sm-9">
																						<input type="text" name="brand" id="brand" class="form-control" placeholder="Brand" value="<?php echo $brand[$row] ?>">
																					</div>
																				</div>
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">Model</label>
																					<div class="col-sm-9">
																						<input type="text" name="model" id="model" class="form-control" placeholder="Model" value="<?php echo $model[$row] ?>">
																					</div>
																				</div>
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">Supplier</label>
																					<div class="col-sm-9">
																						<input type="text" name="supplier" id="supplier" class="form-control" placeholder="Supplier" value="<?php echo $supplier[$row] ?>">
																					</div>
																				</div>
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">สาเหตุ</label>
																					<div class="col-sm-9">
																						<textarea class="form-control" name="remark" id="remark"><?php echo $remark[$row] ?></textarea>
																					</div>
																				</div>
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">แผนกที่ส่งซ่อม</label>
																					<div class="col-sm-9">
																						<select name="depart" id="depart_edit<?php echo $ids ?>" style="width: 100%;" class="form-control" required>
																							<?php foreach ($company_Code as $key => $value) {?>
																								<option value="<?php echo $value." | ".$department_Name[$key] ?>" <?php if($value." | ".$department_Name[$key] == $department[$row]){ echo " selected=\"selected\""; } ?>><?php echo $value." | ".$department_Name[$key]; ?></option>
																							<?php  } ?>
																						</select>
																						<script type="text/javascript">
																							$(document).ready(function() {
																								$('#depart_edit<?php echo $ids ?>').select2();
																							});
																						</script>
																					</div>
																				</div>
																				<div class="form-group row">
																					<label for="inputEmail3" class="col-sm-3 col-form-label">สถานะรับคืน</label>
																					<div class="col-sm-9">
																						<?php if($status[$row] == 0){ ?>
																							<select name="status" id="status" class="form-control" style="width: 100%;" required>
																								<option value="1" <?php if($status[$row] == 1){ echo " selected=\"selected\""; } ?>>ได้รับ</option>
																								<option value="0" <?php if($status[$row] == 0){ echo " selected=\"selected\""; } ?>>ยังไม่ได้รับคืน</option>
																							</select>
																							<?php 
																						}else{?>
																							<label for="inputEmail3" class="col-sm-9 col-form-label">ได้รับแล้ว</label>
																							<input type="hidden" name="status" id="status" value="1">
																						<?php } ?>
																					</div>
																				</div>
																				<input type="hidden" name="id" id="id" value="<?php echo $ids ?>">
																				<input type="hidden" name="method" id="method" value="printer">
																				<input type="hidden" name="method_status" id="method_status" value="edit">
																			</div>
																			<div class="modal-footer">
																				<button class="btn btn-secondary" type="reset"><i class="fas fa-redo-alt"></i> Cancel</button>
																				<button class="btn btn-success" type="submit"><i class="fa fa-download"></i> Save</button>
																			</div>
																		</form>
																	</div>
																</div>
															</div>
															<td><a href="frm_/process/update_data.php?method=printer&method_status=delete&id=<?php echo $ids ?>" class="btn btn-danger btn-icon-split" onclick="return confirm('คุณต้องการยกเลิกรายการนี้?')">
																<span class="icon text-white-50">
																	<i class="fa fa-trash"></i>
																</span>
																<span class="text">ยกเลิก</span></a></td>
															</tr>
														<?php
													}
												}
												?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#depart').select2();
			});
			$(document).ready(function() {
				$('#dataTable_printer').DataTable({
					responsive: true,
					"lengthMenu": [[-1,50 ,25 ,10], ["All",50 ,25 ,10]]
				});
			} );
		</script>






















	<?php include('nav-end.php'); ?>

	<script src="vendor/modernizr/modernizr.custom.js"></script>
	<script src="vendor/popper.js/dist/umd/popper.js"></script>
	<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
	<script src="vendor/js-storage/js.storage.js"></script>
	<script src="vendor/jquery.easing/jquery.easing.js"></script>
	<script src="vendor/animo/animo.js"></script>		
	<script src="vendor/screenfull/dist/screenfull.js"></script>
	<script src="vendor/jquery-localize/dist/jquery.localize.js"></script>
	<script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="vendor/jquery-sparkline/jquery.sparkline.js"></script>
	<script src="vendor/flot/jquery.flot.js"></script>
	<script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
	<script src="vendor/flot/jquery.flot.resize.js"></script>
	<script src="vendor/flot/jquery.flot.pie.js"></script>
	<script src="vendor/flot/jquery.flot.time.js"></script>
	<script src="vendor/flot/jquery.flot.categories.js"></script>
	<script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script>
	<script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script>
	<script src="vendor/moment/min/moment-with-locales.js"></script>
	<script src="js/app.js"></script>
</body>
</html>