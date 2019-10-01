	<?php
	session_start();
	if(!isset($_SESSION['u_ID']))
	{
		echo "<script>window.location.href='signin.php'</script>";
	}
	$url	=	basename($_SERVER['REQUEST_URI']);
	?>


<?php

include('_connection/_connect_mysqli.r');
include('_connection/_connect_mysqli.php');
include('_connection/_connect_srvsql.php');

$srvsql			=	new	srvsql();
$connect_srvsql	=	$srvsql->connect_srvsql();

?>

	<div class="loader" id="load">
		<div class="page-load">
			<i class="fa fa-refresh fa-spin fa-5x"></i>
		</div>
	</div>
	<div class="wrapper">
		<header class="topnavbar-wrapper">
			<nav class="navbar topnavbar" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="#/">
						<div class="brand-logo">
							<img class="img-fluid" src="img/logo.png" alt="App Logo">
						</div>
						<div class="brand-logo-collapsed">
							<img class="img-fluid" src="img/logo-single.png" alt="App Logo">
						</div>
					</a>
				</div>
				<ul class="navbar-nav mr-auto flex-row">
					<li class="nav-item">
						<a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="#" data-trigger-resize="" data-toggle-state="aside-collapsed">
							<em class="fa fa-navicon"></em>
						</a>
						<a class="nav-link sidebar-toggle d-md-none" href="#" data-toggle-state="aside-toggled" data-no-persist="true">
							<em class="fa fa-navicon"></em>
						</a>
					</li>
					<li class="nav-item d-none d-md-block">
						<a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse">
							<em class="icon-user"></em>
						</a>
					</li>
					<li class="nav-item d-none d-md-block">
						<a class="nav-link" href="lock.php" title="Lock screen">
							<em class="icon-lock"></em>
						</a>
					</li>
					<li class="nav-item d-none d-md-block">
						<a class="nav-link" href="signout.php" title="Lock screen">
							<em class="icon icon-login"></em>
						</a>
					</li>

				</ul>
				<ul class="navbar-nav flex-row">
					<li class="nav-item">
						<a class="nav-link" href="#" data-search-open="">
							<em class="icon-magnifier"></em>
						</a>
					</li>
					<li class="nav-item d-none d-md-block">
						<a class="nav-link" href="#" data-toggle-fullscreen="">
							<em class="fa fa-expand"></em>
						</a>
					</li>
					<li class="nav-item dropdown dropdown-list">
						<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-toggle="dropdown">
							<em class="icon-bell"></em>
							<span class="badge badge-danger">11</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right animated flipInX">
							<div class="dropdown-item">
								<div class="list-group">
									<div class="list-group-item list-group-item-action">
										<div class="media">
											<div class="align-self-start mr-2">
												<em class="fa fa-twitter fa-2x text-info"></em>
											</div>
											<div class="media-body">
												<p class="m-0">New followers</p>
												<p class="m-0 text-muted text-sm">1 new follower</p>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action">
										<div class="media">
											<div class="align-self-start mr-2">
												<em class="fa fa-envelope fa-2x text-warning"></em>
											</div>
											<div class="media-body">
												<p class="m-0">New e-mails</p>
												<p class="m-0 text-muted text-sm">You have 10 new emails</p>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action">
										<div class="media">
											<div class="align-self-start mr-2">
												<em class="fa fa-tasks fa-2x text-success"></em>
											</div>
											<div class="media-body">
												<p class="m-0">Pending Tasks</p>
												<p class="m-0 text-muted text-sm">11 pending task</p>
											</div>
										</div>
									</div>
									<div class="list-group-item list-group-item-action">
										<span class="d-flex align-items-center">
											<span class="text-sm">More notifications</span>
											<span class="badge badge-danger ml-auto">14</span>
										</span>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
							<em class="icon-notebook"></em>
						</a>
					</li>
				</ul>
				<form class="navbar-form" role="search" action="http://themicon.co/theme/angle/v3.8.5/html5jquery-bs4/app/search.html">
					<div class="form-group">
						<input class="form-control" type="text" placeholder="Type and hit enter ...">
						<div class="fa fa-times navbar-form-close" data-search-dismiss=""></div>
					</div>
					<button class="d-none" type="submit">Submit</button>
				</form>
			</nav>
		</header>
		<aside class="aside">
			<div class="aside-inner">
				<nav class="sidebar" data-sidebar-anyclick-close="">
					<ul class="sidebar-nav">
						<li class="has-user-block">
							<a href="profile.php">
								<div class="collapse" id="user-block">
									<div class="item user-block">
										<div class="user-block-picture">
											<div class="user-block-status">
												<img class="img-thumbnail rounded-circle" src="img/user/<?php echo $_SESSION['user_Photo']; ?>" alt="Avatar" width="60" height="60">
												<div class="circle bg-success circle-lg"></div>
											</div>
										</div>
										<div class="user-block-info">
											<span class="user-block-name">Hello, <?php echo $_SESSION['user_Fname']?></span>
											<span class="user-block-role">
												<?php
													$sql	=	"
																SELECT	*
																FROM	section
																WHERE	sec_ID	=	'".$_SESSION['u_sec']."'
																";
													$query	=	mysqli_query($connect_mysqli,$sql) or die(mysqli_error());
													$row	=	mysqli_fetch_array($query,MYSQLI_ASSOC);
													echo $row['sec_Name'];
												?>
											</span>
										</div>
									</div>
								</div>
							</a>
						</li>
						<li class="nav-heading ">
							<span>Jobs</span>
						</li>
						<li class="<?php echo ($url=='job-add.php' ? 'active' : '') ?>">
							<a href="job-add.php" title="Widgets">
								<em class="icon-grid"></em>
								<span>Insert Job</span>
							</a>
						</li>
						<li class="">
							<a href="#dashboard" title="Dashboard" data-toggle="collapse">
								<div class="float-right badge badge-danger">
									<?php  
										$sql	=	"
													SELECT	*
													FROM	iservices
													WHERE	u_ID		=	'".$_SESSION['u_ID']."'
													AND		(
															status_ID	=	1
															OR
															status_ID	=	2
															)
													";
										$query	=	mysqli_query($connect_mysqli,$sql);
										echo mysqli_num_rows($query);
									?>
								</div>
								<em class="icon-speedometer"></em>
								<span>Jobs</span>
							</a>
							<ul class="sidebar-nav sidebar-subnav collapse" id="dashboard">
								<li class="sidebar-subnav-header">Jobs</li>
								<li class=" <?php echo ($url=='job-all.php' ? 'active' : '')?>">
									<a href="job-all.php" title="Dashboard v2">
									<span>All Job.</span>
									</a>
								</li>
								<li class="<?php echo ($url=='job-new.php' ? 'active' : '')?>"> 
									<a href="job-new.php" title="Dashboard v1">
										<em class="icon-speedometer"></em>
										<span>New Job.</span>
										<div class="float-right badge badge-danger">
											<?php  
												$sql	=	"
															SELECT	*
															FROM	iservices
															WHERE	u_ID		=	'".$_SESSION['u_ID']."'
															AND		status_ID	=	1
															";
												$query	=	mysqli_query($connect_mysqli,$sql);
												echo mysqli_num_rows($query);
											?>
										</div>
									</a>
								</li>
								<li class="<?php echo ($url=='job-wait.php' ? 'active' : '')?>">
									<a href="job-wait.php" title="Dashboard v2">
										<span>Waiting Job.</span>
										<div class="float-right badge badge-danger">
											<?php  
												$sql	=	"
															SELECT	*
															FROM	iservices
															WHERE	u_ID		=	'".$_SESSION['u_ID']."'
															AND		status_ID	=	2
															";
												$query	=	mysqli_query($connect_mysqli,$sql);
												echo mysqli_num_rows($query);
											?>
										</div>
									</a>
								</li>
								<li class="<?php echo ($url=='job-success.php' ? 'active' : '')?>">
									<a href="job-success.php" title="Dashboard v3">
										<span>Success Job.</span>
										<div class="float-right badge badge-success">
											<?php  
												$M = substr(date('Y-m-d',strtotime(str_replace('-', '/', date("Y-m-d")) . "-1 month")),0,-3);
												$sql_count_disM		=	"
																		SELECT COUNT(*) as 'coudisM'
																		FROM iservices
																		WHERE service_Date_Start LIKE '".$M."%'
																		AND		status_ID	=	4
																		";
												$queryM	=	mysqli_query($connect_mysqli,$sql_count_disM);
												echo mysqli_num_rows($queryM);
											?>
										</div>
									</a>
								</li>
								<li class="<?php echo ($url=='job-cancel.php' ? 'active' : '')?>">
									<a href="job-cancel.php" title="Dashboard v3">
										<span>Cancel Job.</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-heading ">
							<span>Inventory</span>
						</li>
						<li class="">
							<a href="#inventory" title="Maps" data-toggle="collapse">
								<em class="icon-map"></em>
								<span>Inventory</span>
							</a>
							<ul class="sidebar-nav sidebar-subnav collapse" id="inventory">
								<li class="sidebar-subnav-header">Inventory</li>
								<li class="<?php echo ($url=='item.php' ? 'active' : '')?>">
									<a href="item.php" title="Google Maps">
										<span>Items</span>
									</a>
								</li>
								<li class="<?php echo ($url=='report-item.php' ? 'active' : '')?>">
									<a href="report-item.php" title="Vector Maps">
										<span>report</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-heading ">
							<span>Asset</span>
						</li>
						<li class="">
							<a href="#list" title="Maps" data-toggle="collapse">
								<em class="icon-map"></em>
								<span>Asset</span>
							</a>
							<ul class="sidebar-nav sidebar-subnav collapse" id="list">
								<li class="sidebar-subnav-header">Asset</li>
								<li class="">
									<a href="list-add-hardware.php" title="Google Maps">
										<span>Add Items - Hardware</span>
									</a>
								</li>
								<li class="">
									<a href="list-add-software.php" title="Google Maps">
										<span>Add Items - Software</span>
									</a>
								</li>
								<li class="">
									<a href="list-sumall.php" title="Google Maps">
										<span>List - Sum All</span>
									</a>
								</li>
								<li class="">
									<a href="list-sumhw.php" title="Google Maps">
										<span>List - Sum Hardware</span>
									</a>
								</li>
								<li class="">
									<a href="list-sumsw.php" title="Google Maps">
										<span>List - Sum Software</span>
									</a>
								</li>
								<li class="">
									<a href="list-sumrent.php" title="Google Maps">
										<span>List - Sum Rent</span>
									</a>
								</li>
								<li class="">
									<a href="list-all.php" title="Google Maps">
										<span>List - List All</span>
									</a>
								</li>
								<li class="">
									<a href="list-companyhw.php" title="Google Maps">
										<span>List - List Hardware</span>
									</a>
								</li>
								<li class="">
									<a href="list-companysw.php" title="Google Maps">
										<span>List - List Software</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-heading ">
							<span>Dashboard</span>
						</li>
						<li class=" ">
							<a href="#maps" title="Maps" data-toggle="collapse">
								<em class="icon-map"></em>
								<span>Dashboard</span>
							</a>
							<ul class="sidebar-nav sidebar-subnav collapse" id="maps">
								<li class="sidebar-subnav-header">Dashboard</li>
								<li class=" ">
									<a href="report-all.php" title="Google Maps">
										<span> * All</span>
									</a>
								</li>
								<?
								$sql	=	"
											SELECT		*
											FROM		company
											ORDER BY	com_T	ASC
											";
								$query	=	mysqli_query($connect_mysqli,$sql) or die(mysqli_error());
								while($row	=	mysqli_fetch_array($query,MYSQLI_ASSOC))
								{
									?>
									<li class=" ">
										<a class="<?php echo ($url=='report.php?com_ID='.$row['com_ID'] ? 'active' : '')?>" href="report.php?com_ID=<?php echo $row['com_ID']; ?>" title="Google Maps">
											<span><?php echo $row['com_T']; ?></span>
										</a>
									</li>
									<?
								}
								?>
							</ul>
						</li>
						<li class="nav-heading ">
							<span>Management</span>
						</li>
						<li class=" ">
							<a href="#extras" title="Extras" data-toggle="collapse">
								<em class="icon-cup"></em>
								<span>Extras</span>
							</a>
							<ul class="sidebar-nav sidebar-subnav collapse" id="extras">
								<li class="sidebar-subnav-header">Extras</li>
								
								<li class=" ">
									<a href="#" title="Contacts">
										<span>User</span>
									</a>
								</li>
								<li class=" ">
									<a href="#" title="Contacts">
										<span>Department</span>
									</a>
								</li>
								<li class=" ">
									<a href="#" title="Contacts">
										<span>Company</span>
									</a>
								</li>
								<li class=" ">
									<a href="contacts.html" title="Contacts">
										<span>Type</span>
									</a>
								</li>
								<li class=" ">
									<a href="#" title="Contacts">
										<span>Subtype</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-heading ">
							<span><hr></span>
						</li>
						<li class="<?php echo ($url=='frm_Printer_Form.php' ? 'active' : '') ?>">
							<a href="frm_Printer_Form.php" title="Widgets">
								<em class="icon-grid"></em>
								<span>Printer</span>
							</a>
						</li>
						<li class="<?php echo ($url=='frm_Quotation_Form.php' ? 'active' : '') ?>">
							<a href="frm_Quotation_Form.php" title="Widgets">
								<em class="icon-grid"></em>
								<span>Quotations</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</aside>
		<aside class="offsidebar d-none">
			<nav>
				<div role="tabpanel">
					<ul class="nav nav-tabs nav-justified" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
								<em class="icon-equalizer fa-lg"></em>
							</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
								<em class="icon-user fa-lg"></em>
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade active show" id="app-settings" role="tabpanel">
							<h3 class="text-center text-thin mt-4">Settings</h3>
							<div class="p-2">
								<h4 class="text-muted text-thin">Themes</h4>
								<div class="row row-flush mb-2">
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-a.css">
												<input type="radio" name="setting-theme" checked="checked">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-info"></span>
													<span class="color bg-info-light"></span>
												</span>
												<span class="color bg-white"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-b.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-green"></span>
													<span class="color bg-green-light"></span>
												</span>
												<span class="color bg-white"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-c.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-purple"></span>
													<span class="color bg-purple-light"></span>
												</span>
												<span class="color bg-white"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-d.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-danger"></span>
													<span class="color bg-danger-light"></span>
												</span>
												<span class="color bg-white"></span>
											</label>
										</div>
									</div>
								</div>
								<div class="row row-flush mb-2">
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-e.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-info-dark"></span>
													<span class="color bg-info"></span>
												</span>
												<span class="color bg-gray-dark"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-f.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-green-dark"></span>
													<span class="color bg-green"></span>
												</span>
												<span class="color bg-gray-dark"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-g.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-purple-dark"></span>
													<span class="color bg-purple"></span>
												</span>
												<span class="color bg-gray-dark"></span>
											</label>
										</div>
									</div>
									<div class="col mb-2">
										<div class="setting-color">
											<label data-load-css="css/theme-h.css">
												<input type="radio" name="setting-theme">
												<span class="icon-check"></span>
												<span class="split">
													<span class="color bg-danger-dark"></span>
													<span class="color bg-danger"></span>
												</span>
												<span class="color bg-gray-dark"></span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="p-2">
								<h4 class="text-muted text-thin">Layout</h4>
								<div class="clearfix">
									<p class="float-left">Fixed</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-fixed" type="checkbox" data-toggle-state="layout-fixed">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">Boxed</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-boxed" type="checkbox" data-toggle-state="layout-boxed">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">RTL</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-rtl" type="checkbox">
											<span></span>
										</label>
									</div>
								</div>
							</div>
							<div class="p-2">
								<h4 class="text-muted text-thin">Aside</h4>
								<div class="clearfix">
									<p class="float-left">Collapsed</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-collapsed" type="checkbox" data-toggle-state="aside-collapsed">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">Collapsed Text</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-collapsed-text" type="checkbox" data-toggle-state="aside-collapsed-text">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">Float</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-float" type="checkbox" data-toggle-state="aside-float">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">Hover</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-hover" type="checkbox" data-toggle-state="aside-hover">
											<span></span>
										</label>
									</div>
								</div>
								<div class="clearfix">
									<p class="float-left">Show Scrollbar</p>
									<div class="float-right">
										<label class="switch">
											<input id="chk-hover" type="checkbox" data-toggle-state="show-scrollbar" data-target=".sidebar">
											<span></span>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="app-chat" role="tabpanel">
							<h3 class="text-center text-thin mt-4">Connect_mysqliions</h3>
							<div class="list-group">
								<div class="list-group-item border-0">
									<small class="text-muted">ONLINE</small>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/05.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Juan Sims</strong>
											</a>
											<br>
											<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-success circle-lg"></span>
										</div>
									</div>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/06.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Maureen Jenkins</strong>
											</a>
											<br>
											<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-success circle-lg"></span>
										</div>
									</div>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/07.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Billie Dunn</strong>
											</a>
											<br>
											<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-danger circle-lg"></span>
										</div>
									</div>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/08.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Tomothy Roberts</strong>
											</a>
										<br>
										<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-warning circle-lg"></span>
										</div>
									</div>
								</div>
								<div class="list-group-item border-0">
									<small class="text-muted">OFFLINE</small>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/09.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Lawrence Robinson</strong>
											</a>
											<br>
											<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-warning circle-lg"></span>
										</div>
									</div>
								</div>
								<div class="list-group-item list-group-item-action border-0">
									<div class="media">
										<img class="align-self-center mr-3 rounded-circle thumb48" src="img/user/10.jpg" alt="Image">
										<div class="media-body text-truncate">
											<a href="#">
												<strong>Tyrone Owens</strong>
											</a>
											<br>
											<small class="text-muted">Designeer</small>
										</div>
										<div class="ml-auto">
											<span class="circle bg-warning circle-lg"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</aside>
		<section>
			<div class="content-wrapper">
				<div class="content-body">