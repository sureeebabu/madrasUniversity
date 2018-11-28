
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Madras University</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/dropzone.min.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/fonts.googleapis.com.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/
		bootstrap-datepicker3.min.css">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/
		jquery.multiselect.css">

		<link rel="stylesheet" href="<?php echo base_url(); ?>css/myStyle.css" />

		<script src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>js/dropzone.min.js"></script>
		<script src="<?php echo base_url(); ?>js/ace.min.js"></script>
		<script src="<?php echo base_url(); ?>js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
		<script src="<?php echo base_url(); ?>js/site.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.bootstrap-duallistbox.min.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.session.js"></script>
		<script src="<?php echo base_url(); ?>js/jquery.multiselect.js"></script>
	</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
					<small>
						<i class="fa fa-university"></i>
						<?php 
						if($_SESSION['userType'] =='Admin')
						{
							echo "IDE Admin";
						}elseif($_SESSION['userType'] =='Student')
						{
							echo "Student Portal";
						}elseif($_SESSION['userType'] =='Staff')
						{
							echo "Staff Portal";
						}
						?>
						
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="http://localhost/mu/ci/images/userImg/noImg.png" alt="Users Image" />
							<span class="user-info">
								<small>Welcome,</small>
								<?=$_SESSION['userEmail'];?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<!-- <li>
								<a href="#">
									<i class="ace-icon fa fa-cog"></i>
									Settings
								</a>
							</li> -->
							<?php
								if($_SESSION['userType'] =='Staff' or $_SESSION['userType'] =='Admin')
							 : ?>
							<li>
								<a href="<?php echo base_url('ChangePwdCtrl/'); ?>">
									<i class="ace-icon fa fa-key"></i>
									Change password
								</a>
							</li>
							<li class="divider"></li>
							<?php endif ?>
							

							<li>
								<a href="<?php echo base_url('logoutCtrl/'); ?>">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
			<div id="sidebar" class="sidebar responsive ace-save-state">
				<?php  if($_SESSION['userType'] =='Admin'): ?>
				<ul class="nav nav-list">
					<li <?php if($this->uri->segment(1)=="DashboardCtrl"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('DashboardCtrl/'); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li> 
					<li <?php if($this->uri->segment(1)=="UserController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('UserController/'); ?>"  >
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Users </span> 
						</a> 
					</li>
					<li <?php if($this->uri->segment(1)=="BatchController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('BatchController/'); ?>"  >
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">Batch</span> 
						</a> 
					</li>
				<li <?php if($this->uri->segment(1)=="CourseController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('CourseController/'); ?>"  >
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> Courses </span> 
						</a> 
					</li>
					<li <?php if($this->uri->segment(1)=="StaffController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('StaffController/'); ?>"  >
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> Staff </span> 
						</a> 
					</li>
				<li <?php if($this->uri->segment(1)=="QuestionController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('QuestionController/'); ?>"  >
							<i class="menu-icon fa fa-question"></i>
							<span class="menu-text"> Question Bank </span> 
						</a> 
					</li>
			<li <?php if($this->uri->segment(1)=="StaffStudentController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('StaffStudentController/'); ?>"  >
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Staff Allocation</span> 
						</a> 
					</li>
			<li <?php if($this->uri->segment(1)=="QuestAlloController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('QuestAlloController/'); ?>"  >
							<i class="menu-icon fa fa-question-circle"></i>
							<span class="menu-text"> Question Allocation</span> 
						</a> 
					</li>
		<li <?php if($this->uri->segment(1)=="AssignmentSummaryController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('AssignmentSummaryController/'); ?>"  >
							<i class="menu-icon fa fa-folder"></i>
							<span class="menu-text">Assign Summary</span> 
						</a> 
					</li>
				 <!-- <li class="">
						<a href="#"  >
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text">Marks Override</span> 
						</a> 
					</li>
				 -->	  
				</ul><!-- /.nav-list -->
				<?php endif;?>

				<?php  if($_SESSION['userType'] =='Student'): ?>
				<ul class="nav nav-list">
		<li <?php if($this->uri->segment(1)=="StudentDashboardCtrl"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('StudentDashboardCtrl/'); ?>">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
						<b class="arrow"></b>
					</li>
		<li <?php if($this->uri->segment(1)=="StudAssignController"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('StudAssignController/'); ?>">
							<i class="menu-icon fa fa-edit"></i>
							<span class="menu-text"> My Assignment </span>
						</a>
						<b class="arrow"></b>
					</li>
		<li <?php if($this->uri->segment(1)=="StudentMarksCtrl"){echo 'class="active"';}?>>
						<a href="<?php echo base_url('StudentMarksCtrl/'); ?>">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text"> My Marks </span>
						</a>
						<b class="arrow"></b>
					</li>

				</ul>
				<?php endif;?>

	<?php  if($_SESSION['userType'] =='Staff'): ?>

	<ul class="nav nav-list">
		<li <?php if($this->uri->segment(1)=="StaffDashboardCtrl"){echo 'class="active"';}?>>
			<a href="<?php echo base_url('StaffDashboardCtrl/'); ?>">
				<i class="menu-icon fa fa-tachometer"></i>
				<span class="menu-text"> Dashboard </span>
			</a>
			<b class="arrow"></b>
		</li>
		<li <?php if($this->uri->segment(1)=="StaffCorrectionCtrl"){echo 'class="active"';}?>>
			<a href="<?php echo base_url('StaffCorrectionCtrl/'); ?>">
				<i class="menu-icon fa fa-check"></i>
				<span class="menu-text"> For Correction </span>
			</a>
			<b class="arrow"></b>
		</li>
	</ul>
	<?php endif;?>
		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
</div>	