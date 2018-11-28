<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');

?>
<div class="main-content">
<div class="main-content-inner">
<div class="breadcrumbs ace-save-state" id="breadcrumbs">
<ul class="breadcrumb">
	<li>
		<i class="ace-icon fa fa-tachometer"></i>
		<a href="#">Dashboard</a> 
	</li>
</ul><!-- /.breadcrumb -->

</div>

<div class="page-content">

<div class="row">
	<div class="col-xs-12">
		<div class="row">
			<div class="col-xs-12">
				<!-- dashboard content goes here... -->
				<!-- <?=$_SESSION['userType'];?> -->

				<div class="infobox infobox-green">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-book"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number">
							<?php foreach($courseCount as $cData):?>
									<?php echo $cData->totalCourseCount ?>
								</option>
							<?php endforeach;?>
						</span>
						<div class="infobox-content">
					 <a href="<?php echo base_url('CourseController/index'); ?>">Total Course</a>
						</div>
					</div>
				</div>

				<div class="infobox infobox-blue">
					<div class="infobox-icon">
						<i class="ace-icon fa fa-users"></i>
					</div>

					<div class="infobox-data">
						<span class="infobox-data-number">
							<?php foreach($staffCount as $sData):?>
									<?php echo $sData->totalStaffCount ?>
								</option>
							<?php endforeach;?>
						</span>
						<div class="infobox-content">
					 <a href="<?php echo base_url('StaffController/index'); ?>">Total Staffs</a>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>
</div>
</div>
</div>


<?php
include ('footer.php');
?>