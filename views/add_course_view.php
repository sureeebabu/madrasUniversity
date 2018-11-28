<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('header.php');
?>

<div class="main-content">
<div class="main-content-inner">

<div class="page-content">

<div class="row">
	<div class="col-xs-2"></div>
	<div class="col-xs-7">

		<div class="widget-box">
			<div class="widget-header widget-header-flat">
				<h4 class="widget-title"><?php echo $mode?> Course</h4>
				<a href="<?php echo base_url('CourseController/index'); ?>" class="btn btn-primary   pull-right" >Course List</a>
			</div>

<?php
	$dataMode = "";
	if($mode == "Add New "){
		$dataMode = "insertCourseData";
	}elseif($mode =="Edit"){
		$dataMode = "updateCourseData/".$courseID;
	}
	//echo "some = " .$dataMode;
?>

		<form id="addCourseVal" action=" <?php echo site_url('CourseController/'.$dataMode); ?>" method="post">
		<div class="widget-body">
			<div class="widget-main">
				<div class="row">
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Enter Course Name <span class="required">*</span></label>
						<div class="col-sm-9">
							<input type="text" name="txtCourse" required="required" id="txtCourse" style="width:450px;" maxlength="100" value="<?php if($mode == "Edit") { echo $r->courseName ? $r->courseName : "" ;}?>" placeholder="Enter Course"   />
						</div>
					</div>
					&nbsp;
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Course Code <span class="required">*</span></label>

						<div class="col-sm-9">
							<input type="text" name="txtCoursecode"  required="required" style="width:450px;" id="txtCoursecode" maxlength="20"  placeholder="Enter Course Code" class="col-xs-10 col-sm-5" 
						value="<?php if($mode == "Edit") { echo $r->course_code ? $r->course_code : "" ;}?>"
							/>
						</div>
					</div>&nbsp;

				<!-- <div class="form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Semester</label>
					<div class="col-sm-9">
						
						<select id="sltSemester" name="sltSemester" required="required" class="col-xs-12 col-sm-12" style="width: 200px;" >
							<option value="" >-- Select Semester --</option>
							<?php foreach($semesterData as $sData):?>
								<option value="<?php echo $sData->semesterID; ?>" <?php if($mode == "Edit"){if ($r->semesterID == $sData->semesterID) echo 'selected = "selected"'; } ?> >
									<?php echo $sData->semesterName?>
								</option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				&nbsp; -->
					<!-- <div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Semester Count</label>

						<div class="col-sm-9">
							<input type="text" name="txtSemCount"  required="required" style="width:450px;" id="txtSemCount" maxlength="100" placeholder="Enter Semester Count" class="col-xs-10 col-sm-5"
							value="<?php if($mode == "Edit") { echo $r->semestercount ? $r->semestercount : "" ;}?>"
							 />
						</div>
					</div>&nbsp; -->
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" name="btnAddEditCourse" class="btn btn-primary pull-right" >
						</div>
					</div>
				</div>

			</div>
		</div>
	</form>
		</div>
	</div><!-- /.col -->
	<div class="col-xs-3">&nbsp;</div>
</div>

</div>


</div>
</div>



<?php
include ('footer.php');
?>